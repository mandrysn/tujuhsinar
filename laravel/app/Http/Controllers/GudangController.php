<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\OrderKerjaSub;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderKerjaSub::where('status_produksi', '4')->get();
        
        return view('transaksi.gudang.gudang', compact('data'));
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
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $data = OrderKerjaSub::findOrFail($id);
        $data->status_produksi = $data->status_produksi + 1;
        $data->save();

        if ($data->produk_id == '1') {
            $produk = 'outdoor';

        } else if ($data->produk_id == '2') {
            $produk = 'indoor';
            
        } else if ($data->produk_id == '3') {
            $produk = 'merchant';
            
        } else if ($data->produk_id == '4') {
            $produk = 'print';
            
        } else if ($data->produk_id == '5') {
            $produk = 'costum';

        } else {
            return 'Are You Lost ?';

        }

        return redirect()->route('gudang');
    }
}
