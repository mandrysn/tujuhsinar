<?php

namespace App\Http\Controllers;

use App\Quotation;

use App\Models\Harga;
use App\Models\Editor;
use App\Models\Barang;
use App\Models\Member;
use App\Models\HargaPrint;
use App\Models\HargaIndoor;
use App\Models\HargaCostum;
use App\Models\HargaOutdoor;
use App\Models\HargaMerchant;

use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Harga::all();
        return view('master.harga.harga', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::all();
        $data = Harga::all();
        $barangs = Barang::all();
        $editors = Editor::all();

        return view('master.harga.harga_create', compact( 'member', 'data', 'barangs','editors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekData = Harga::where('member_id', '=', $request->member_id)->first();
        
        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->keterangan = $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }
        return redirect()->route('harga.show', $id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function outdoor(Request $request)
    {   
        $produk_id = 1;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', $produk_id)->first();
        
        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Outdoor' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaOutdoor;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function outdoorEdit(Request $request)
    {   
        $produk_id = 1;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=',$produk_id)->first();

        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Outdoor' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaOutdoor;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indoor(Request $request)
    {
        $produk_id = 2;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=',$produk_id)->first();

        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Indoor' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaIndoor;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indoorEdit(Request $request)
    {
        $produk_id = 2;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=',$produk_id)->first();

        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Indoor' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaIndoor;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function merchant(Request $request)
    {   
        $produk_id = 3;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', $produk_id)->first();
        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Merchant' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaMerchant;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function merchantEdit(Request $request)
    {   
        $produk_id = 3;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', $produk_id)->first();
        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Merchant' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaMerchant;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printQuarto(Request $request)
    {   
        $produk_id = 4;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', $produk_id)->first();

        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Print Quarto' : $request->keterangan;
            $modelHargaBaru->save();

            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaPrint;
        $data->harga_id = $harga_id;
        $data->tipe_print = $request->tipe_print;
        $data->ukuran = $request->pilih_ukuran;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printQuartoEdit(Request $request)
    {
        $produk_id = 4;
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', $produk_id)->first();

        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = $produk_id;
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Print Quarto' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaPrint;
        $data->harga_id = $harga_id;
        $data->tipe_print = $request->tipe_print;
        $data->ukuran = $request->pilih_ukuran;
        $data->barang_id = $request->barang_id;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function costumProduk(Request $request)
    {
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', 5)->first();
        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = '5';
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Costum Produk' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaCostum;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        // $data->range_min = $request->range_min;
        // $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function costumProdukEdit(Request $request)
    {
        $cekData = Harga::where('member_id', '=', $request->member_id)->where('produk_id', '=', 5)->first();
        if ( is_null($cekData) ) {
            $modelHargaBaru = new Harga;
            $modelHargaBaru->member_id = $request->member_id;
            $modelHargaBaru->produk_id = '5';
            $modelHargaBaru->keterangan = is_null($request->keterangan) ? 'Harga Costum Produk' : $request->keterangan;
            $modelHargaBaru->save();
            $harga_id = $modelHargaBaru->id;
        } else {
            $harga_id = $cekData->id;
        }

        $data = new HargaCostum;
        $data->harga_id = $harga_id;
        $data->barang_id = $request->barang_id;
        // $data->range_min = $request->range_min;
        // $data->range_max = $request->range_max;
        $data->harga_pokok = $request->harga_pokok;
        $data->harga_jual = $request->harga_jual;
        $data->disc = $request->disc;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('harga.show', $harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Harga::findOrFail($id);

        if ($datas->produk_id == '1') {
            $data = HargaOutdoor::where('harga_id', '=', $datas->id)->get();
            $page = 'outdoor_edit';

        } else if ($datas->produk_id == '2') {
            $data = HargaIndoor::where('harga_id', '=', $datas->id)->get();
            $page = 'indoor_edit';
            
        } else if ($datas->produk_id == '3') {
            $data = HargaMerchant::where('harga_id', '=', $datas->id)->get();
            $page = 'merchant_edit';
            
        } else if ($datas->produk_id == '4') {
            $data = HargaPrint::where('harga_id', '=', $datas->id)->get();
            $page = 'a3_edit';
            
        } else if ($datas->produk_id == '5') {
            $data = HargaCostum::where('harga_id', '=', $datas->id)->get();
            $page = 'costum_edit';
        } else {
            return 'Are You Lost ?';
        }
        
        $barangs = Barang::all();
        $member = Member::all();
        $editors = Editor::all();
        return view('master.harga.produk.' . $page, compact('data', 'datas', 'barangs', 'member','editors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSub(Request $request)
    {
        $data = new HargaSub();
        $data->harga_id = $request->harga_id;
        $data->ukuran = $request->ukuran;
        $data->range_min = $request->range_min;
        $data->range_max = $request->range_max;
        $data->harga_pokok = $request->hrg_pokok;
        $data->harga_jual = $request->hrg_jual;
        $data->disc = $request->disc;
        $data->keterangan = 'NULL';
        $data->save();
        return redirect()->route('harga.show', $request->harga_id)->with('alert-success', 'Data Berhasil Ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Harga::where('id', $id)->get();
        $cekData = Harga::where('id', '!=', $id)->get();
        $member = Member::all();
        $editors = Editor::all();
        return view('master.harga.harga_edit', compact('data', 'cekData', 'member','editors'));
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
        $data = Harga::where('id', $id)->first();
        $data->member_id = $request->member_id;
        $data->ukuran = $request->ukuran;
        $data->range = $request->range;
        $data->harga_pokok = $request->hrg_pokok;
        $data->harga_jual = $request->hrg_jual;
        $data->disc = $request->disc;
        $data->save();
        return redirect()->route('harga.index')->with('alert-success', 'Data Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Harga::where('id', $id)->first();
        $data->delete();
        return redirect()->route('harga.index')->with('alert-success', 'Data Berhasil Dihapus !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function outdoorDestroy($id)
    {
        $data = HargaOutdoor::findOrFail($id);
        $data->delete();
        return redirect()->route('harga.show', $data->harga_id)->with('alert-success', 'Data Berhasil Dihapus !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indoorDestroy($id)
    {
        $data = HargaIndoor::findOrFail($id);
        $data->delete();
        return redirect()->route('harga.show', $data->harga_id)->with('alert-success', 'Data Berhasil Dihapus !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displayDestroy($id)
    {
        $data = HargaMerchant::findOrFail($id);
        $data->delete();
        return redirect()->route('harga.show', $data->harga_id)->with('alert-success', 'Data Berhasil Dihapus !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printQuartoDestroy($id)
    {
        $data = HargaPrint::findOrFail($id);
        $data->delete();
        return redirect()->route('harga.show', $data->harga_id)->with('alert-success', 'Data Berhasil Dihapus !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function costumProdukDestroy($id)
    {
        $data = HargaCostum::findOrFail($id);
        $data->delete();
        return redirect()->route('harga.show', $data->harga_id)->with('alert-success', 'Data Berhasil Dihapus !');
    }
}