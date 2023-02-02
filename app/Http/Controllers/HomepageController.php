<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Jobs\SendMailLienHe;
use App\Models\Config;
use App\Models\LichChieu;
use App\Models\LienHe;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomepageController extends Controller
{
    public function index()
    {
        $config = Config::orderByDESC('id')->first();
        $list_phim = Phim::where('tinh_trang' , '>' , 0)->get();
        if($config){
            $phim_1 = Phim::where('id', $config->id_phim)->first();
            $phim_2 = Phim::where('id', $config->phim_2)->first();
            $phim_3 = Phim::where('id', $config->phim_3)->first();

            return view('Client.homepage', compact('config', 'phim_1', 'phim_2', 'phim_3' , 'list_phim'));
        }else{
            return view('Client.homepage', compact('list_phim'));
        }

    }

    public function test()
    {
        Log::info("Oke, đã chạy!");
        // return view('client.kich_hoat_tai_khoan');
    }

    public function chiTietPhim($slug)
    {
        $parts = explode('-', $slug);
        preg_match('/\d+$/', $slug, $matches);
        $id = $matches[0];
        $phim = Phim::where('id' , $id)->first();
        $lichChieu = LichChieu::where('id_phim', $id)
                              ->where('thoi_gian_ket_thuc', '>=', Carbon::now()->toDateTimeString())
                              ->get();

        return view('client.chi_tiet_phim' , compact('phim', 'lichChieu'));
    }

    public function viewLogin()
    {
        return view('client.login');
    }

    public function viewPhimDangChieu()
    {
        $list_phim = Phim::where('tinh_trang' , 1)->get();
        return view('client.phim' , compact('list_phim'));
    }

    public function viewPhimSapChieu()
    {
        $list_phim = Phim::where('tinh_trang' , 2)->get();
        return view('client.phim' , compact('list_phim'));
    }

    public function actionTimKiem(Request $request)
    {
        $search = $request->search;
        // "SELECT * FROM `phims` WHERE ten_phim LIKE '%Avatar%';"
        $list_phim = Phim::where('ten_phim' , 'like' , '%' . $search . '%')
                         ->get();

        return view('client.phim' , compact('list_phim'));
    }

    public function viewLienHe()
    {
        return view('client.lien_he');
    }

    public function sendLienHe(Request $request)
    {
        $data = $request->all();
        LienHe::create($data);
        // Phân cụm này qua JOB
        $dataMail['ho_va_ten'] = $request->ho_va_ten;
        $dataMail['email']     = $request->email;
        $dataMail['tieu_de']   = $request->tieu_de;
        $dataMail['noi_dung']  = $request->noi_dung;

        SendMailLienHe::dispatch($dataMail);

        return response()->json([
            'status'    =>   true,
            'message'   =>   'Đã gửi liên hệ chúng tôi sẽ phản hồi sớm !'
        ]);
    }

}
