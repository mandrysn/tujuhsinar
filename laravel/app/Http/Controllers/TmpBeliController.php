<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\TmpBeli;
use Illuminate\Http\Request;

class TmpBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $brg = Barang::find($request->barang);
        $harga = $request->harga * $request->qty;
        TmpBeli::create([
            'barang_id' => $request->barang,
            'qty' => $request->qty,
            'harga' => $harga
        ]);
        return redirect()->route('pembelian.index')->with('alert-tmp-beli', 'Barang Telah Masuk Ke Daftar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        return $barang->hrg_beli;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if ($id == 0) {
        //     TmpBeli::destroy();
        //     return redirect()->route('pembelian.index')->with('alert-pembelian', 'Barang Sudah Terbeli!');
        // }else{
            TmpBeli::destroy($id);
            return redirect()->route('pembelian.index')->with('alert-tmp-beli', 'Barang Di Daftar Telah Di Hapus');
        //}
    }
}
