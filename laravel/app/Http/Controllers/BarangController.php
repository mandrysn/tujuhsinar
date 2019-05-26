<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
<<<<<<< HEAD
=======
use App\Models\UkuranBahan;
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        $supplier = Supplier::all();
        
        return view('master.tools.barang.barang', compact('data', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('master.tools.barang.barang_create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'unique:barangs'
        ]);
        
        $data = new Barang();
        $data->supplier_id = $request->supplier_id;
        $data->barcode = $request->barcode;
        $data->produk_id = $request->produk_id;
        $data->nm_barang = $request->nm_barang;
        $data->kategori = $request->kategori;
        $data->satuan = $request->satuan;
        $data->hrg_beli = $request->hrg_beli;
        $data->min_stok = $request->min_stok;
        $data->save();
        return redirect()->route('barang.index')->with('alert-barang', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::where('id', $id)->get();
        $supplier = Supplier::all();
        return view('master.tools.barang.barang_edit', compact('data', 'supplier'));
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
        $this->validate($request, [
            'barcode' => 'unique:barangs,barcode,'.$id
        ]);
        
        $data = Barang::where('id', $id)->first();
        $data->supplier_id = $request->supplier_id;
        $data->barcode = $request->barcode;
        $data->produk_id = $request->produk_id;
        $data->nm_barang = $request->nm_barang;
        $data->kategori = $request->kategori;
        $data->satuan = $request->satuan;
        $data->hrg_beli = $request->hrg_beli;
        $data->min_stok = $request->min_stok;
        $data->save();
        return redirect()->route('barang.index')->with('alert-barang', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::where('id', $id)->delete();
        return redirect()->route('barang.index')->with('alert-barang', 'Data Berhasil Dihapus');
    }
}