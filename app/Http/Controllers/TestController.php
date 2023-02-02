<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\GheBan;
use App\Models\LichChieu;
use App\Models\Phong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $ten_san_pham = 'Iphone 14 Promax do controller';

        return view('vue_01', compact('ten_san_pham'));
    }

    public function jquery()
    {
        dd(phpinfo());

       return view('AdminRocker.page.test');
    }

    public function test()
    {
        dd(Auth::guard('customer')->check());
    }

    public function chart()
    {
        $ngay_dau_tuan  =  Carbon::today()->startOfWeek();
        $ngay_cuoi_tuan  =  Carbon::today()->endOfWeek();
        $list_day = [];
        for ($i = 1; $i < 8; $i++) {
            array_push($list_day , $ngay_dau_tuan->format("d/m/Y"));
            $ngay_dau_tuan->addDay();
        }

        $ngay_dau_tuan  =  Carbon::today()->startOfWeek();

        $list_user_db = Customer::where('created_at', '>=',  $ngay_dau_tuan)
                                ->where('created_at', '<=', $ngay_cuoi_tuan )
                                ->select(
                                    DB::raw('COUNT(created_at) as total'),
                                    DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as day')
                                )
                                ->groupBy('day')
                                ->get();

        $list_user = [];
        foreach($list_day as $key => $value) {
            $gia_tri = 0;
            foreach($list_user_db as $key_2 => $value_2) {
                if($value == $value_2->day) {
                    $gia_tri = $value_2->total;
                }
            }
            array_push($list_user, $gia_tri);
        }
        return view('AdminRocker.chart' , compact('list_day' , 'list_user'));
    }
}
