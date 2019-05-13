<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;

use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pekerjaan::all();
        return view('master.pekerjaan.pekerjaan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pekerjaan.pekerjaan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pekerjaan();
        $data->nm_pekerjaan = $request->nm_pekerjaan;
        $data->nm_jenis = $request->nm_jenis;
        $data->keterangan = $request->keterangan;
        $data->printer_id = $request->printer_id;
        $data->save();
        return redirect()->route('pekerjaan.index')->with('alert-success', 'Data Berhasil Ditambah');
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
        $data = Pekerjaan::where('id', $id)->get();
        $printer = Printer::all();
        return view('master.pekerjaan.pekerjaan_edit', compact('data', 'printer'));
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
        $data = Pekerjaan::where('id', $id)->first();
        $data->nm_pekerjaan = $request->nm_pekerjaan;
        $data->nm_jenis = $request->nm_jenis;
        $data->keterangan = $request->keterangan;
        $data->printer_id = $request->printer_id;
        $data->save();
        return redirect()->route('pekerjaan.index')->with('alert-success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pekerjaan::where('id', $id)->delete();
        return redirect()->route('pekerjaan.index')->with('alert-success', 'Data Berhasil Dihapus');
    }
}