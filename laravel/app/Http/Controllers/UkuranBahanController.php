<?php

namespace App\Http\Controllers;

use App\Models\UkuranBahan;
use Illuminate\Http\Request;

class UkuranBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UkuranBahan::all();
        return view('master.tools.ukuran-bahan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new UkuranBahan();
        $data->nm_ukuran_bahan = $request->nm_ukuran_bahan;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->produk_id = $request->produk_id;
        $data->save();

        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function show(UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function edit(UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UkuranBahan $ukuranBahan)
    {
        $ukuranBahan->nm_ukuran_bahan = $request->nm_ukuran_bahan;
        $ukuranBahan->produk_id = $request->produk_id;
        $ukuranBahan->range_min = $request->range_min;
        $ukuranBahan->range_max = $request->range_max;
        $ukuranBahan->save();

        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UkuranBahan $ukuranBahan)
    {
        $ukuranBahan->delete();
        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran','Data berhasi dihapus!');
    }
}
