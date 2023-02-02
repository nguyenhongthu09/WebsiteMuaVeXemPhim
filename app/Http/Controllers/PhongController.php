<?php

namespace App\Http\Controllers;

use App\Models\Ghe;
use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function index()
    {
        return view('AdminRocker.page.Phong.index');
    }

    public function store(Request $request)
    {
        // 1. Ta sẽ thêm mới phòng
        $newPhong = Phong::create([
            'ten_phong'     => $request->ten_phong,
            'tinh_trang'    => $request->tinh_trang,
            'hang_ngang'    => $request->hang_ngang,
            'hang_doc'      => $request->hang_doc,
        ]);

        for($dong = 1; $dong <= $request->hang_ngang; $dong++) {
            $chu = chr($dong + 64);
            for($cot = 1; $cot <= $request->hang_doc; $cot++) {
                $ten_ghe = $chu . $cot;
                Ghe::create([
                    'ten_ghe'       => $ten_ghe,
                    'tinh_trang'    => 1,
                    'id_phong'      => $newPhong->id,
                ]);
            }
        }

        return response()->json([
            'status'    =>  true,
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $phong = Phong::where('id', $request->id)->first();

        if($phong) {
            $phong->ten_phong   = $request->ten_phong;
            $phong->tinh_trang  = $request->tinh_trang;
            $phong->hang_ngang  = $request->hang_ngang;
            $phong->hang_doc    = $request->hang_doc;
            $phong->save();

            // Xóa sạch ghế trong phòng
            Ghe::where('id_phong', $request->id)->delete();
            // Tạo mới lại số ghế $request->hang_doc * $request->hang_ngang
            for($dong = 1; $dong <= $request->hang_ngang; $dong++) {
                $chu = chr($dong + 64);
                for($cot = 1; $cot <= $request->hang_doc; $cot++) {
                    $ten_ghe = $chu . $cot;
                    Ghe::create([
                        'ten_ghe'       => $ten_ghe,
                        'tinh_trang'    => 1,
                        'id_phong'      => $request->id,
                    ]);
                }
            }
        }

        return response()->json([
            'status' => true,
            'messs'  => "Cập nhập phòng chiếu thành công!",
        ]);
    }

    public function getData()
    {
        $data = Phong::get();
        return response()->json([
            'list'  => $data
        ]);
    }

    public function changeStatus($id)
    {
        $phong = Phong::where('id', $id)->first();

        if($phong) {
            $phong->tinh_trang = !$phong->tinh_trang;
            $phong->save();
        }
    }

    public function destroy($id)
    {
        $phong = Phong::where('id', $id)->first();

        if($phong) {
            Ghe::where('id_phong', $id)->delete();
            $phong->delete();
        }
    }

    public function edit($id)
    {
        $phong = Phong::where('id', $id)->first();

        return response()->json([
            'data'  => $phong
        ]);
    }

    public function getDataGhe($id_phong)
    {
        $phong = Phong::where('id', $id_phong)->first();
        $data  = Ghe::where('id_phong', $id_phong)->get();

        return response()->json([
            'danh_sach_ghe'     => $data,
            'thong_tin_phong'   => $phong,
        ]);
    }
}
