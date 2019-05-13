<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\StokBarangPembelian;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembelian::all();
        return view('inventory.pembelian.pembelian', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $barangs = Barang::all();

        return view('inventory.pembelian.pembelian_create', compact(['suppliers', 'barangs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $baru = new Pembelian;
        $baru->tgl_pembelian = $request->tgl;
        $baru->tipe_pembayaran = $request->tipe_pembayaran;
        $baru->supplier_id = $request->supplier;
        $baru->barang_id = $request->barang;
        $baru->qty = $request->qty;
        $baru->harga = $request->harga;

        $baru->save();

        $ambilData = Pembelian::orderBy('created_at', 'desc')->first();
        $baru1 = new StokBarangPembelian;
        $baru1->pembelian_id = $ambilData->id;
        $baru1->qty = $request->qty;;

        $baru1->save();

        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $barangs = Barang::all();

        $data = Pembelian::find($id);

        return view('inventory.pembelian.pembelian_edit', compact(['data', 'barangs', 'suppliers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pembelian::find($id);
        $data->tgl_pembelian = $request->tgl;
        $data->tipe_pembayaran = $request->tipe_pembayaran;
        $data->supplier_id = $request->supplier;
        $data->barang_id = $request->barang;
        $data->qty = $request->qty;
        $data->harga = $request->harga;

        $data->update();

        return redirect()->route('pembelian.index');
    }

    public function getBarang($id)
    {
        $barang = Pembelian::find($id);
        return $barang->qty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
