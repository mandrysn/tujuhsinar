<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Barang;
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
use App\Models\UkuranBahan;
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
<<<<<<< HEAD
        $data = UkuranBahan::all();
        return view('master.ukuran-bahan.index', compact('data'));
=======
        $bahan = Barang::all();
        $data = UkuranBahan::all();
        return view('master.tools.ukuran-bahan.index', compact('data', 'bahan'));
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
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
<<<<<<< HEAD
        //
=======
        $data = new UkuranBahan();
        $data->nm_ukuran_bahan = $request->nm_ukuran_bahan;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->produk_id = $request->produk_id;
        $data->save();

        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'Data Berhasil Ditambah');
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
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
<<<<<<< HEAD
        //
=======
        $ukuranBahan->nm_ukuran_bahan = $request->nm_ukuran_bahan;
        $ukuranBahan->barang_id = $request->barang_id;
        $ukuranBahan->produk_id = $request->produk_id;
        $ukuranBahan->range_min = $request->range_min;
        $ukuranBahan->range_max = $request->range_max;
        $ukuranBahan->save();

        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran', 'ukuranBahan Berhasil Diubah');
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UkuranBahan $ukuranBahan)
    {
<<<<<<< HEAD
        //
=======
        $ukuranBahan->delete();
        return redirect()->route('ukuran-bahan.index')->with('alert-ukuran','Data berhasi dihapus!');
    }

    public function getBahan(Request $r)
    {
        if ($r->ajax()) {
            $sumberDatas = Barang::where('produk_id', '=', $r->id)->get();
            
            return response()->json($sumberDatas->toArray());
        }
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
    }
}
