<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Antrian::where('status', '=', 0)->get();
        return view('transaksi.antrian.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAntrian()
    {
        $ctk = Antrian::orderBy('updated_at', 'desc')->orderBy('nomor', 'asc')->orderBy('status', 'desc')->first();
        if ($ctk == null) {
            return view('transaksi.antrian.customer', compact('ctk'));
        } elseif ($ctk->updated_at->format('d-m-Y') != \Carbon\Carbon::now()->format('d-m-Y')) {
            Antrian::truncate();
        } 
        return view('transaksi.antrian.customer', compact('ctk'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function konfirmasi($id)
    {
        $antrian = Antrian::find($id);
        $antrian->status = 1;
        $antrian->update();

        return redirect()->route(Helper::role() . '.order.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AntrianCetak()
    {
        $cekData = Antrian::all();
        $data = Antrian::orderBy('nomor', 'desc')->first();
        $data1 = Antrian::orderBy('nomor', 'desc')->get();
        if ($data1->isEmpty()) {
            $new = new Antrian;
            $new->nomor = 1;
            $new->status = 0;
            $new->save();

            return redirect()->route(Helper::role() . '.antrian')->with('alert-success', 'Antrian Berhasil Ditambah');

        } elseif (!$data1->isEmpty()) {
            $nomorTerakhir = $data->nomor;

            $new = new Antrian;
            $new->nomor = (int) $nomorTerakhir + 1;
            $new->status = 0;
            $new->save();

            return redirect()->route(Helper::role() . '.antrian')->with('alert-success', 'Antrian Berhasil Ditambah');
        } else {
            $antrian = 0;
        }
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
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function show(Antrian $antrian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function edit(Antrian $antrian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antrian $antrian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antrian $antrian)
    {
        //
    }
}
