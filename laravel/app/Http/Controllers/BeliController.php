<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use App\Models\Barang;
use App\Models\TmpBeli;
use App\Models\BeliDetail;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beli = Beli::orderBy('tgl_pembelian', 'desc')->get();
        $barang = Barang::all();
        $tmpb = TmpBeli::all();
        $tot = TmpBeli::sum('harga');
        return view('pembelian/pembelian', compact('beli', 'barang', 'tmpb', 'tot'));
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
        $tmp = TmpBeli::all();
        $harga = TmpBeli::sum('harga');
        if ($request->bayar < $harga) $status = 'Utang';
        else $status = 'Lunas';
        
        $beli = Beli::create([
            'tgl_pembelian' => date('Y-m-d'),
            'status_pembayaran' => $status,
            'total_harga' => $harga,
            'total_bayar' => $request->bayar
        ]);

        foreach ($tmp as $anu) {
            BeliDetail::create([
                'beli_id'   => $beli->id,
                'barang_id' => $anu->barang_id,
                'qty'       => $anu->qty,
                'harga'     => $anu->harga,
                'created_at'=> $anu->created_at
            ]);

            $bb = Barang::find($anu->barang_id);
            $stok = $bb->min_stok + $anu->qty;

            Barang::find($anu->barang_id)->update([
                'min_stok' => $stok
            ]);
        }
        //$tmp->delete();
        //error
        TmpBeli::truncate();

        return redirect()->route('pembelian.index')->with('alert-pembelian', 'Barang Sudah Terbeli!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Beli::find($id);
        $ewe = BeliDetail::where('beli_id', $id)->get();
        //dd($ewe);
        return view('pembelian/barangbeli', compact('barang', 'ewe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $beli = Beli::find($id);
        $sudah = $beli->total_bayar + $request->bayar;
        
        if ($sudah < $beli->total_harga) $status = 'Utang';
        else $status = 'Lunas';

        Beli::find($id)->update([
            'status_pembayaran' => $status,
            'total_bayar' => $sudah
        ]);
        if ($status == 'Lunas') return redirect()->route('utang')->with('alert-utang', 'Pembelian Sudah Lunas!');
        else return redirect()->route('utang')->with('alert-utang', 'Pembelian Masih Belum Lunas!');
        //dd('Belum Ada Coeg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Beli::destroy($id);
        return redirect()->route('pembelian.index')->with('alert-pembelian', 'Data Barang Pembelian Telah Dihapus!');
    }

    public function utang(){
        $beli = Beli::where('status_pembayaran', 'Utang')->orderBy('tgl_pembelian', 'desc')->get();
        return view('pembelian/utang', compact('beli'));
        //dd('Table Hutang');
    }

    public function utangbeli($id){
        $barang = Beli::find($id);
        $ewe = BeliDetail::where('beli_id', $id)->get();
        return view('pembelian/utangbeli', compact('barang', 'ewe'));
        //dd('Table Hutang '. $id );
    }

    public function laporan(Request $request){
        $beli       = Beli::orderBy('id', 'asc')->first();
        $tglawal    = $beli->tgl_pembelian;
        $awal       = (isset($request->awal)) ? $request->awal : $tglawal;
        $akhir      = (isset($request->akhir)) ? $request->akhir : date('Y-m-d');

        $beli = Beli::whereBetween('tgl_pembelian', [$awal, $akhir])->orderBy('tgl_pembelian', 'desc')->get();

        return view('laporan/lapbeli', compact('beli', 'awal', 'akhir'));
    }

    public function cetak($awal, $akhir){
        $beli = Beli::whereBetween('tgl_pembelian', [$awal, $akhir])->orderBy('tgl_pembelian', 'asc')->get();
        $sum = Beli::whereBetween('tgl_pembelian', [$awal, $akhir])->sum('total_harga');
        return view('laporan/cetak/cetbeli', compact('beli', 'sum'));
    }

    public function cetakdetail($id){
        $beli = Beli::find($id);
        $detail = BeliDetail::where('beli_id', $id)->get();
        return view('laporan/cetak/cetdetbeli', compact('beli', 'detail'));    
    }

}




