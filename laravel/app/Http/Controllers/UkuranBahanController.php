<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\UkuranBahan;
use App\Models\UkuranBahanDetail;

use Illuminate\Http\Request;

class UkuranBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $bahan = Barang::all();
        $data = UkuranBahan::orderby('range_min', 'asc')->get();
        return view('master.tools.ukuran-bahan.index', compact('data', 'bahan'));
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
        $data = new UkuranBahan();
        $data->nm_ukuran_bahan = $request->nm_ukuran_bahan;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->produk_id = $request->produk_id;
        $data->save();

        $brg = $request->barang_id;
        for ($i=0; $i < count($brg); $i++) { 
            $data2 = new UkuranBahanDetail;
            $data2->ukuran_bahan_id = $data->id;
            $data2->barang_id = $brg[$i];
            $data2->save();
        }

        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function show(UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function edit(UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UkuranBahan $ukuranBahan)
    {   
        $ukuranBahan->nm_ukuran_bahan = $request->nm_ukuran_bahan;
        $ukuranBahan->produk_id = $request->produk_id;
        $ukuranBahan->range_min = $request->range_min;
        $ukuranBahan->range_max = $request->range_max;
        $ukuranBahan->save();

        UkuranBahanDetail::where('ukuran_bahan_id', $ukuranBahan->id)->delete();
        $brg = $request->barang_id;
        for ($i=0; $i < count($brg); $i++) { 
            $data2 = new UkuranBahanDetail;
            $data2->ukuran_bahan_id = $ukuranBahan->id;
            $data2->barang_id = $brg[$i];
            $data2->save();
        }
        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'Ukuran Bahan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UkuranBahan $ukuranBahan)
    {   
        UkuranBahanDetail::where('ukuran_bahan_id',$ukuranBahan->id)->delete();
        $ukuranBahan->delete();

        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'Data berhasi dihapus!');
    }

    public function getBahan(Request $r)
    {
        if ($r->ajax()) {
            $sumberDatas = Barang::where('produk_id', '=', $r->id)->get();
            
            return response()->json($sumberDatas->toArray());
        }
    }
}
