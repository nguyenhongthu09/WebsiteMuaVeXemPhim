<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckIdPhimRequest;
use App\Http\Requests\CreatePhimRequest;
use App\Http\Requests\UpdatePhimRequest;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function index()
    {
        return view('AdminLTE.Page.Phim.index');
    }

    public function store(Request $request)
    {
        $phim = Phim::where('slug_ten_phim', $request->slug_ten_phim)->first();
        if ($phim) {
            return response()->json([
                'slug' => true,
            ]);
        } else {
            $data   = $request->all();
            Phim::create($data);
            return response()->json([
                'trang_thai_them_moi' => true,
            ]);
        }
    }

    public function getData()
    {
        $data = Phim::orderByDESC('created_at')->get();
        return response()->json([
            'phim'  => $data,
        ]);
    }

    public function indexVue()
    {
        return view('AdminRocker.page.Phim.index_vue');
    }

    public function storeVue(CreatePhimRequest $request)
    {
        $data   = $request->all();
        Phim::create($data);
    }

    public function destroy(CheckIdPhimRequest $request)
    {
        Phim::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    => true,
        ]);
    }

    public function update(UpdatePhimRequest $request)
    {
        $data = $request->all();
        $phim = Phim::where('id', $request->id)->first();
        $phim->update($data);

        return response()->json([
            'status'    => true,
        ]);
    }
}
