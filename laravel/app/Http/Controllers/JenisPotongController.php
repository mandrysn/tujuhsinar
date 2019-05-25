<?php

namespace App\Http\Controllers;

use Session;

use App\Models\JenisPotong;
use Illuminate\Http\Request;

class JenisPotongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisPotong::all();
        return view('master.tools.potong.potong', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.tools.potong.potong_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new JenisPotong();
        $data->jenis_potong = $request->jenis_potong;
        $data->kategori = $request->kategori;
        $data->harga_pokok = $request->harga_pokok;
        $data->save();
        return redirect()->route('tools.index')->with('alert-potong', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPotong  $jenisPotong
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPotong $jenisPotong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPotong  $jenisPotong
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JenisPotong::where('id', $id)->get();
        return view('master.tools.potong.potong_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPotong  $jenisPotong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPotong $id)
    {
        $data = JenisPotong::where('id', $id)->first();
        $data->jenis_potong = $request->jenis_potong;
        $data->harga_pokok = $request->harga_pokok;
        $data->kategori = $request->kategori;
        $data->save();
        return redirect()->route('tools.index')->with('alert-potong', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPotong  $jenisPotong
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPotong $id)
    {
        $data = JenisPotong::where('id', $id)->first();
        $data->delete();
        return redirect()->route('tools.index')->with('alert-potong','Data berhasi dihapus!');
    }
}
