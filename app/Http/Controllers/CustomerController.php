<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapNhapMatKhauRequest;
use App\Http\Requests\CapNhapThongTinRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterAccountRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Jobs\SendMailJob;
use App\Mail\KichHoatTaiKhoanMail;
use App\Models\Customer;
use App\Models\QuanLyBaiViet;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function viewThongTin()
    {
        return view('AdminRocker.page.KhachHang.index');
    }

    public function getData()
    {
        $data = Customer::get();

        return response()->json([
            'data'  => $data,
        ]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $phim = Customer::where('id', $request->id)->first();
        $phim->update($data);

        return response()->json([
            'status'    => true,
        ]);
    }

    public function destroy(Request $request)
    {
        Customer::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    => true,
        ]);
    }

    public function changeStatus($id)
    {
        $change = Customer::find($id);
        if($change->loai_tai_khoan == -1) {
            $change->loai_tai_khoan = 1;
        } else  {
            $change->loai_tai_khoan = -1;
        }
        $change->save();
    }

    public function kichHoat($id)
    {
        $kickHoat = Customer::find($id);
        if($kickHoat->loai_tai_khoan == 0) {
            $kickHoat->loai_tai_khoan = 1;
            $kickHoat['hash_mail'] = Str::uuid();
        }
        else if($kickHoat->loai_tai_khoan == 1) {
            $kickHoat->loai_tai_khoan = 0;
            $kickHoat['hash_mail'] = '';
        }
        $kickHoat->save();
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        $khachHang = Customer::find($data['id']);
        $khachHang->password = bcrypt($data['password']);
        $khachHang->save();

        return response()->json([
            'status'    => true,
        ]);
    }


    public function viewCapNhapThongTin()
    {

        return view('client.profile');
    }

    public function capNhapThongTin(CapNhapThongTinRequest $request)
    {
        $data = $request->all();
        $id = Auth::guard('customer')->user()->id;
        $user = Customer::find($id);
        $user->update($data);

        toastr()->success("Đã cập nhập thông tin thành công!!");

        return redirect()->back();
    }

    public function viewCapNhapMatKhau()
    {
        return view('client.cap_nhap_mat_khau');
    }

    public function capNhapMatKhau(CapNhapMatKhauRequest $request)
    {
        $id = Auth::guard('customer')->user()->id;
        $user = Customer::find($id);

        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success("Đã cập nhập mật khẩu thành công!!");

        return redirect()->back();
    }


    public function actionUpdatePassword(UpdatePasswordRequest $request)
    {
        $customer = Customer::where('hash_reset', $request->hash_reset)->first();

        $customer->hash_reset = '';
        $customer->password = bcrypt($request->password);
        $customer->save();

        toastr()->success('Đã cập nhật mật khẩu thành công!');

        return redirect('/login');
    }

    public function viewUpdatePassword($hash)
    {
        $customer = Customer::where('hash_reset', $hash)->first();

        if($customer) {
            return view('client.cap_nhat_mat_khau', compact('hash'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }
    }

    public function actionResetPassword(ResetPasswordRequest $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        $hash     = Str::uuid();

        $customer->hash_reset = $hash;
        $customer->save();

        toastr()->success('Vui lòng kiểm tra email');

        return redirect()->back();
    }

    public function viewResetPassword()
    {
        return view('client.quen_mat_khau');
    }

    public function viewRegister()
    {
        return view('client.register');
    }


    public function actionRegister(RegisterAccountRequest $request)
    {
        $data = $request->all();
        $hash = Str::uuid(); // tạo ra 1 biến tên hash kiểu string có 36 ký tự không trùng với nhau
        $data['hash_mail'] = $hash;
        $data['password']  = bcrypt($data['password']);
        Customer::create($data);

        // Phân cụm này qua JOB
        $dataMail['ho_va_ten'] = $request->ho_va_ten;
        $dataMail['email']     = $request->email;
        $dataMail['hash_mail'] = $hash;

        SendMailJob::dispatch($dataMail);

        // SendMailJob::dispatch($dataMail);
        // End Phân JOB

        toastr()->success('Đã tạo tài khoản thành công!');
        return redirect('/login');
    }

    public function viewLogin()
    {
        return view('client.login');
    }

    public function actionLogin(LoginRequest $request)
    {
        $data['email']      = $request->email;
        $data['password']   = $request->password;
        $check = Auth::guard('customer')->attempt($data);
        if($check) {
            $customer = Auth::guard('customer')->user();
            if($customer->loai_tai_khoan == -1) {
                toastr()->error("Tài khoản đã bị khóa!");
                Auth::guard('customer')->logout();
            } else if($customer->loai_tai_khoan == 0) {
                toastr()->warning("Tài khoản chưa được kích hoạt!");
                Auth::guard('customer')->logout();
            } else {
                toastr()->success("Đã đăng nhập thành công!");
            }
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
        }

        return redirect('/client/cap-nhap-thong-tin');
    }

    public function actionActive($hash)
    {
        $account = Customer::where('hash_mail', $hash)->first();
        if($account && $account->loai_tai_khoan == 0) {
            $account->loai_tai_khoan = 1;
            $account->hash_mail = '';
            $account->save();
            toastr()->success('Đã kích hoạt tài khoản thành công!');
        } else {
            toastr()->error('Thông tin không chính xác!');
        }

        return redirect('/login');
    }

    public function viewBaiViet()
    {
        $baiViet = QuanLyBaiViet::where('is_open', 1)->paginate(2);
        return view('client.bai_viet', compact('baiViet'));
    }

    public function viewBaiVietDetail($id)
    {
        $baiVietDetail = QuanLyBaiViet::find($id);
        $baiViet = QuanLyBaiViet::where('is_open', 1)->get();
        return view('client.bai_viet_detail', compact('baiVietDetail','baiViet'));
    }

    public function actionLogout()
    {
        Auth::guard('customer')->logout();

        return redirect('/login');
    }
}
