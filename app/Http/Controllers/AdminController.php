<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaiKhoanRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('AdminRocker.login');
    }

    public function actionLogin(Request $request)
    {
        $data['email']      = $request->email;
        $data['password']   = $request->password;
        $check = Auth::guard('admin')->attempt($data);
        if($check) {
            toastr()->success("Đã đăng nhập thành công!");
            return redirect('/admin/tai-khoan/index');
        } else {
            toastr()->error("Tài khoản hoặc mật khẩu không đúng!");
            return redirect('/admin/login');
        }
    }

    public function index()
    {
        return view('AdminRocker.page.TaiKhoan.index');
    }

    public function getData()
    {
        $data = Admin::get();

        return response()->json([
            'data'  => $data
        ]);
    }

    public function store(CreateTaiKhoanRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        Admin::create($data);
    }

    public function viewHome()
    {
        return redirect('/admin/cau-hinh/index');
    }
}
