<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::all();
        $member = Member::all();
        return view('master.pelanggan.pelanggan', compact('data', 'member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $member = Member::all();
        return view('master.pelanggan.pelanggan_create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pelanggan();
        $data->member_id = $request->member_id;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->email = $request->email;
        $data->save();

        return redirect()->back()->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeModal(Request $request)
    {
        $data = new Pelanggan();
        $data->member_id = $request->member_id;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('order.create')->with('alert-success', 'Data Costumer Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        $member = Member::all();
        return view('master.pelanggan.pelanggan_edit', compact('pelanggan', 'member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->member_id = $request->member_id;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->email = $request->email;
        $pelanggan->update();

        return redirect()->back()->with('alert-success', 'Data Berhasil Ditubah');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->back()->with('alert-success', 'Data Berhasil Dihapus');
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporan() {
        $data = Pelanggan::all();

        return view('laporan.costumer', compact('data'));
    }
}
