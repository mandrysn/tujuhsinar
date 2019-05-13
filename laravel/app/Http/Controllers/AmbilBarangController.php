<?php

namespace App\Http\Controllers;

use App\Models\OrderKerja;
use App\Models\AmbilBarang;

use Illuminate\Http\Request;

class AmbilBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderKerjaSub::where('status_produksi', '=', 1)->where('status_finishing', '=', 1)->where('status_ambil_barang', '=', 0)->get();
        return view('transaksi.ambilbarang.ambilbarang', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AmbilBarang  $ambilBarang
     * @return \Illuminate\Http\Response
     */
    public function show(AmbilBarang $ambilBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AmbilBarang  $ambilBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OrderKerja::findOrFail($id);
        $data->status_barang = $data->status_barang + 1;
        $data->update();

        return redirect()->route('order.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AmbilBarang  $ambilBarang
     * @return \Illuminate\Http\Response
     */
    public function verify($id)
    {
        $data = OrderKerja::findOrFail($id);
        $data->status_barang = 3;
        $data->update();

        return redirect()->route('order.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AmbilBarang  $ambilBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmbilBarang $ambilBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AmbilBarang  $ambilBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmbilBarang $ambilBarang)
    {
        //
    }
}
