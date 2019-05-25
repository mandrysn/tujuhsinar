<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();
        return view('master.supplier.supplier', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.supplier.supplier_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();
        $data->nm_lengkap = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->email = $request->email;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('supplier.index')->with('alert-success', 'Data Berhasil Ditambah');
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
        $data = Supplier::where('id', $id)->get();
        return view('master.supplier.supplier_edit', compact('data'));
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
        $data = Supplier::where('id', $id)->first();
        $data->nm_lengkap = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->email = $request->email;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('supplier.index')->with('alert-success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Supplier::where('id', $id)->delete();
        return redirect()->route('supplier.index')->with('alert-success', 'Data Berhasil Dihapus');
    }
}