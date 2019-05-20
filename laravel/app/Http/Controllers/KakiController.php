<?php

namespace App\Http\Controllers;

use App\Models\Kaki;
use App\Models\Member;

use Illuminate\Http\Request;

class KakiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kaki::all();
        $member = Member::all();
        return view('master.tools.kaki.kaki', compact('data', 'member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.tools.kaki.kaki_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kaki();
        $data->nama_kaki = $request->nama_kaki;
        $data->member_id = $request->member_id;
        $data->produk_id = $request->produk_id;
        $data->tambahan_harga = $request->tambahan_harga;
        $data->save();

        return redirect()->route('kaki.index')->with('alert-display', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kaki  $kaki
     * @return \Illuminate\Http\Response
     */
    public function show(Kaki $kaki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kaki  $kaki
     * @return \Illuminate\Http\Response
     */
    public function edit(Kaki $kaki)
    {
        return view('master.tools.kaki.kaki_edit', compact('kaki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kaki  $kaki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kaki $kaki)
    {
        $kaki->nama_kaki = $request->nama_kaki;
        $kaki->produk_id = $request->produk_id;
        $kaki->member_id = $request->member_id;
        $kaki->tambahan_harga = $request->tambahan_harga;
        $kaki->save();

        return redirect()->route('kaki.index')->with('alert-success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kaki  $kaki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kaki $kaki)
    {
        $kaki->delete();
        return redirect()->route('kaki.index')->with('alert-success','Data berhasi dihapus!');
    }
}
