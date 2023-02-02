<?php

namespace App\Http\Controllers;

use App\Models\GheBan;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GheBanController extends Controller
{
    public function huyVeAuto()
    {
        $now = Carbon::now()->subMinutes(2);
        // dd($now);
        GheBan::where('trang_thai', 1)
              ->where('id_bill_ngan_hang', 0)
              ->where('updated_at', '<=', $now->toDateTimeString())
              ->update([
                'trang_thai' => 0,
                'id_khach_hang' => null,
                'ma_giao_dich'  => null,
              ]);
    }

    public function doiTrangThaiGheBan(Request $request)
    {
        $ghe_ban = GheBan::where('id', $request->id)->first();
        $ghe_ban->co_the_ban = !$ghe_ban->co_the_ban;
        $ghe_ban->save();
    }

    public function getData($id_lich)
    {
        $data = GheBan::where('id_lich', $id_lich)->get();

        return response()->json([
            'data'  => $data,
        ]);
    }

    public function giuChoDatVe(Request $request)
    {
        $gheBan = GheBan::where('id', $request->id)
                        ->where('trang_thai', '<>', 1)
                        ->first();
        if ($gheBan) {
            $gheBan->trang_thai = 2;
            $gheBan->id_khach_hang = Auth::guard('customer')->user()->id;
            $gheBan->save();

            GheBan::where('trang_thai', 2)
                  ->where('id_lich', '<>', $gheBan->id_lich)
                  ->where('id_khach_hang', Auth::guard('customer')->user()->id)
                  ->update(['trang_thai' => 0, 'id_khach_hang' => null]);

            return response()->json([
                'status'    => 1,
            ]);
        } else {
            return response()->json([
                'status'    => 0,
            ]);
        }
    }

    public function huyChoDatVe(Request $request)
    {
        $gheBan = GheBan::where('id', $request->id)
                        ->where('trang_thai', '<>', 1)
                        ->first();
        if ($gheBan) {
            $gheBan->trang_thai = 0;
            $gheBan->id_khach_hang = null;
            $gheBan->save();

            return response()->json([
                'status'    => 1,
            ]);
        } else {
            return response()->json([
                'status'    => 0,
            ]);
        }
    }

    public function thanhToan()
    {
        // 1. Lấy thông tin khách hàng đang đăng nhập
        // 2, Lấy danh sách ghế mà nó đã đặt
        // 2.1. Nếu như nó không có đặt ghế nào => chửi cái
        // 2.2. Nếu có thì mình tạo ra cái mã giao dịch => hiển thị ra view
        $user = Auth::guard('customer')->user();
        $dsGheBan = GheBan::where('id_khach_hang', $user->id)->where('trang_thai', 2)->get();
        if(count($dsGheBan) == 0) {
            toastr()->error('Bạn chưa có đặt chổ nên không thể thanh toán');
            return redirect('/');
        }
        $phim = Phim::join('lich_chieus', 'phims.id', 'lich_chieus.id_phim')
                    ->join('ghe_bans', 'lich_chieus.id', 'ghe_bans.id_lich')
                    ->where('lich_chieus.id', $dsGheBan[0]->id_lich)
                    ->select('phims.*', 'lich_chieus.thoi_gian_bat_dau')
                    ->first();
        $maGiaoDich = 'HD' . (78345 + $dsGheBan[0]->id);
        $tongVe = 0;

        foreach($dsGheBan as $key => $value) {
            $value->trang_thai = 1;
            $value->ma_giao_dich = $maGiaoDich;
            $value->save();

            $tongVe = $tongVe + 1;
        }

        return view('client.thanh_toan', compact('phim', 'dsGheBan', 'maGiaoDich', 'tongVe'));
    }
}
