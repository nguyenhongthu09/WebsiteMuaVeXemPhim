<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Phim;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $config         = Config::orderByDESC('id')->first();
        $danhSachPhim   = Phim::where('tinh_trang', '>', 0)->get();
        return view('AdminRocker.page.CauHinh.index', compact('config', 'danhSachPhim'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Config::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
