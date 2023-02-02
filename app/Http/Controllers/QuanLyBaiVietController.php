<?php

namespace App\Http\Controllers;

use App\Models\QuanLyBaiViet;
use Illuminate\Http\Request;

class QuanLyBaiVietController extends Controller
{
    public function index()
    {
        return view('AdminRocker.page.BaiViet.index');
    }

    public function createBaiViet(Request $request)
    {
        $data = $request->all();

        QuanLyBaiViet::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới bài viết thành công !'
        ]);
    }

    public function getData()
    {
        $data = QuanLyBaiViet::all();
        return response()->json([
            'data'    => $data,
        ]);
    }

    public function updateBaiViet(Request $request)
    {
        $updateBaiViet = QuanLyBaiViet::find($request->id)->update($request->all());

        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật bài viết thành công !'
        ]);
    }

    public function delete(Request $request)
    {
        $baiViet = QuanLyBaiViet::find($request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa bài viết thành công !'
        ]);
    }

    public function doiTrangThai($id)
    {
        $baiViet = QuanLyBaiViet::find($id);
        if($baiViet){
            $baiViet->is_open = !$baiViet->is_open;
            $baiViet->save();
            return response()->json([
                'status'    => true,
                'message'   => 'Đã đổi trạng thái bài viết thành công !'
            ]);
        }

    }
}
