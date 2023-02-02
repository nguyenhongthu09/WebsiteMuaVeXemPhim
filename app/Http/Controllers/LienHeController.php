<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{

    public function index()
    {
        return view('AdminRocker.page.LienHe.index');
    }

    public function getData()
    {
        $data = LienHe::all();

        return response()->json(['data' => $data]);
    }

    public function deleteLienHe(Request $request)
    {
        LienHe::find($request->id)->delete();

        return response()->json([
            'status'    =>      true,
            'message'   =>      'Đã xóa liên hệ thành công !'
        ]);

    }

}
