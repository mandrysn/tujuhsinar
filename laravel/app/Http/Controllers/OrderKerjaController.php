<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Kaki;
use App\Models\Harga;
use App\Models\Editor;
use App\Models\Barang;
use App\Models\Member;
use App\Models\Piutang;
use App\Models\Pelanggan;
use App\Models\OrderKerja;
use App\Models\OrderKerjaSub;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderKerja::where('status_payment', '=', 'belum bayar')->orderBy('order', 'desc')->get();
        return view('transaksi.order.order', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaksi()
    {
        $data = OrderKerja::where('status_payment', '!=', 'belum bayar')->orderBy('order', 'desc')->get();
        return view('transaksi.order.transaksi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cari = OrderKerja::count();
        if($cari == 0 ) {
            $add = 1;
        } else {
            $add = $cari + 1;
        }
        $kode = sprintf("%05s", $add);

        $data = Harga::all();
        $kakis = Kaki::all();
        $member = Member::all();
        $barangs = Barang::all();
        $editors = Editor::all();
        $members = Pelanggan::all();
        $order = OrderKerja::latest('id')->first();
        
        return view('transaksi.order.order_create', compact('members', 'barangs', 'kode', 'kakis', 'member', 'order','editors'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOutdoor(Request $request)
    {
        $cekData = OrderKerja::where('order', $request->order)->where('status_payment','belum bayar')->first();
        
        $tambahan_harga = 0;
        $nama_kaki = "Tidak Ada";
        if($request->kaki_id != null || $request->kaki_id != ''){
            $kaki = Kaki::findOrFail($request->kaki_id);
            $tambahan_harga = $kaki->tambahan_harga;
            $nama_kaki = $kaki->nama_kaki;
        } 

        if($request->kaki_id != null || $request->kaki_id != ''){
            $kaki = Kaki::findOrFail($request->kaki_id);
            $tambahan_harga = $kaki->tambahan_harga;
            $nama_kaki = $kaki->nama_kaki;
        } 
        
        
        if ( is_null($cekData) ) {
            $orderKerjaBaru = new OrderKerja;
            $orderKerjaBaru->order = $request->order;
            $orderKerjaBaru->tanggal = \Carbon\Carbon::now();
            $orderKerjaBaru->pelanggan_id = $request->pelanggan_id;
            $orderKerjaBaru->save();
            $orderKerjaId = $orderKerjaBaru->id;
        } else {
            $orderKerjaId = $cekData->id;
        }
        
        $subOrderKerjaBaru = new OrderKerjaSub;
        $subOrderKerjaBaru->order_kerja_id = $orderKerjaId;
        $subOrderKerjaBaru->produk_id = 1;
        $subOrderKerjaBaru->qty = $request->qty;
        $subOrderKerjaBaru->deadline = $request->deadline . ' '. \Carbon\Carbon::now()->toTimeString();
        $subOrderKerjaBaru->harga = $request->harga;
        $subOrderKerjaBaru->total = $request->total;

        //finishing
        $fnsText = "Finishing: ";
        if($request->editor_id != null || $request->editor_id != ''){
            $fnsReq = $request->editor_id;
            for ($i=0; $i < count($fnsReq); $i++) { 
                $editor = Editor::findOrFail($fnsReq[$i]);
                
                $typenya = \Helper::get_type($editor->type);
                $pcsnya = "";
                if(isset($request->id_pcs)){
                    for ($i=0; $i <count($request->id_pcs) ; $i++) { 
                        if($request->id_pcs[$i] == $editor->id && $editor->type == 3){
                            $pcsnya = $request->jumlah_pcs[$i]." Pcs";
                        }
                    }
                }
                    
                $fnsText .= $editor->nama_finishing .' ('.$typenya.' : '.$pcsnya.'), Rp ' . number_format($editor->tambahan_harga) . " - ";
            }
            $fnsText .=  "<br />";
        } else {
            $fnsText = " ";
        }
            
        
        

        $subOrderKerjaBaru->diskon = (isset($request->diskon))?$request->diskon:0;
        $subOrderKerjaBaru->barang_id = $request->barang_id;
        $subOrderKerjaBaru->keterangan_sub  = 'Nama File: '.$request->nama_file."<br />";
        $subOrderKerjaBaru->keterangan_sub  .= 'Ukuran: '.$request->panjang."x".$request->lebar."<br />";
        $subOrderKerjaBaru->keterangan_sub  .= $fnsText;
        $subOrderKerjaBaru->keterangan_sub  .= 'Kaki: ' . $nama_kaki . ', Rp ' . number_format($tambahan_harga);
        $subOrderKerjaBaru->save();

        return redirect()->route('order.show', $orderKerjaId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeIndoor(Request $request)
    {
        $cekData = OrderKerja::where('order', $request->order)->first();
        
        $tambahan_harga = 0;
        $nama_kaki = "Tidak Ada";
        if($request->kaki_id != null || $request->kaki_id != ''){
            $kaki = Kaki::findOrFail($request->kaki_id);
            $tambahan_harga = $kaki->tambahan_harga;
            $nama_kaki = $kaki->nama_kaki;
        }
        
        if ( is_null($cekData) ) {
            $orderKerjaBaru = new OrderKerja;
            $orderKerjaBaru->order = $request->order;
            $orderKerjaBaru->tanggal = \Carbon\Carbon::now();
            $orderKerjaBaru->pelanggan_id = $request->pelanggan_id;
            $orderKerjaBaru->save();
            $orderKerjaId = $orderKerjaBaru->id;
        } else {
            $orderKerjaId = $cekData->id;
        }

        $subOrderKerjaBaru = new OrderKerjaSub;
        $subOrderKerjaBaru->order_kerja_id = $orderKerjaId;
        $subOrderKerjaBaru->produk_id = '2';
        $subOrderKerjaBaru->qty = $request->qty;
        $subOrderKerjaBaru->deadline = $request->deadline_indoor . ' '. \Carbon\Carbon::now()->toTimeString();
        $subOrderKerjaBaru->harga = $request->harga;
        $subOrderKerjaBaru->total = $request->total;
        //finishing
        //finishing
        $fnsText = "Finishing: ";
        if($request->editor_id != null || $request->editor_id != ''){
            $fnsReq = $request->editor_id;
            for ($i=0; $i < count($fnsReq); $i++) { 
                $editor = Editor::findOrFail($fnsReq[$i]);
                
                $typenya = \Helper::get_type($editor->type);
                $pcsnya = "";
                if(isset($request->id_pcs)){
                    for ($i=0; $i <count($request->id_pcs) ; $i++) { 
                        if($request->id_pcs[$i] == $editor->id && $editor->type == 3){
                            $pcsnya = $request->jumlah_pcs[$i]." Pcs";
                        }
                    }
                }
                    
                $fnsText .= $editor->nama_finishing .' ('.$typenya.' : '.$pcsnya.'), Rp ' . number_format($editor->tambahan_harga) . " - ";
            }
            $fnsText .=  "<br />";
        } else {
            $fnsText = " ";
        }
        

        $subOrderKerjaBaru->diskon = (isset($request->diskon))?$request->diskon:0;
        $subOrderKerjaBaru->barang_id = $request->barang_id;
        $subOrderKerjaBaru->keterangan_sub  = 'Nama File: '.$request->nama_file."<br />";
        $subOrderKerjaBaru->keterangan_sub  .= 'Ukuran: '.$request->panjang."x".$request->lebar."<br />";
        $subOrderKerjaBaru->keterangan_sub  .= $fnsText;
        $subOrderKerjaBaru->keterangan_sub  .= 'Kaki: ' . $nama_kaki . ', Rp ' . number_format($kaki->tambahan_harga);
        $subOrderKerjaBaru->save();

        return redirect()->route('order.show', $orderKerjaId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMerchant(Request $request)
    {
        $cekData = OrderKerja::where('order', $request->order)->first();
     
        if ( is_null($cekData) ) {
            $orderKerjaBaru = new OrderKerja;
            $orderKerjaBaru->order = $request->order;
            $orderKerjaBaru->tanggal = \Carbon\Carbon::now();
            $orderKerjaBaru->pelanggan_id = $request->pelanggan_id;
            $orderKerjaBaru->save();
            $orderKerjaId = $orderKerjaBaru->id;
        } else {
            $orderKerjaId = $cekData->id;
        }
        
        $subOrderKerjaBaru = new OrderKerjaSub;
        $subOrderKerjaBaru->order_kerja_id = $orderKerjaId;
        $subOrderKerjaBaru->produk_id = '3';
        $subOrderKerjaBaru->qty = $request->qty;
        $subOrderKerjaBaru->harga = $request->harga;
        $subOrderKerjaBaru->total = $request->total;
        $subOrderKerjaBaru->diskon = (isset($request->diskon))?$request->diskon:0;
        $subOrderKerjaBaru->deadline = $request->deadline_merchant . ' '. \Carbon\Carbon::now()->toTimeString();
        $subOrderKerjaBaru->barang_id = $request->barang_id;
        $subOrderKerjaBaru->keterangan_sub  = $request->keterangan;
        $subOrderKerjaBaru->save();

        return redirect()->route('order.show', $orderKerjaId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePrintQuarto(Request $request)
    {
        $cekData = OrderKerja::where('order', $request->order)->first();
        $nama_finishing = "Tidak Ada";
        $tambahan_harga = 0;
        $fnsText = " ";
        if($request->editor_id != null || $request->editor_id != ''){
            $editor = Editor::findOrFail($request->editor_id);
            $nama_finishing = $editor->nama_finishing;
            $tambahan_harga = $editor->tambahan_harga;
            $fnsText = 'Finishing : ' . $nama_finishing . ', Rp ' . number_format($tambahan_harga) . "<br />";
        }
        
        
        if ( is_null($cekData) ) {
            $orderKerjaBaru = new OrderKerja;
            $orderKerjaBaru->order = $request->order;
            $orderKerjaBaru->tanggal = \Carbon\Carbon::now();
            $orderKerjaBaru->pelanggan_id = $request->pelanggan_id;
            $orderKerjaBaru->save();
            $orderKerjaId = $orderKerjaBaru->id;
        } else {
            $orderKerjaId = $cekData->id;
        }

        $ukuran = '';
        if($request->pilih_ukuran){
            switch ($request->pilih_ukuran) {
                case '1':
                    $ukuran = 'A4';
                    break;
                case '2':
                    $ukuran = 'F4';
                    break;
                case '3':
                    $ukuran = 'A3';
                    break;
            }
        }

        $subOrderKerjaBaru = new OrderKerjaSub;
        $subOrderKerjaBaru->order_kerja_id = $orderKerjaId;
        $subOrderKerjaBaru->produk_id = '4';
        $subOrderKerjaBaru->qty = $request->qty;
        $subOrderKerjaBaru->harga = $request->harga;
        $subOrderKerjaBaru->total = $request->total;
        
        $subOrderKerjaBaru->diskon = (isset($request->diskon))?$request->diskon:0;
        $subOrderKerjaBaru->deadline = $request->deadline_print . ' '. \Carbon\Carbon::now()->toTimeString();
        $subOrderKerjaBaru->barang_id = $request->barang_id;
        $subOrderKerjaBaru->keterangan_sub  = 'Ukuran : '.$ukuran . "<br />";
        $subOrderKerjaBaru->keterangan_sub .= $fnsText;
        $subOrderKerjaBaru->keterangan_sub .= $request->keterangan;

        $subOrderKerjaBaru->save();


        return redirect()->route('order.show', $orderKerjaId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCostumProduk(Request $request) 
    {
        $cekData = OrderKerja::where('order', $request->order)->first();
        
        if ( is_null($cekData) ) {
            $orderKerjaBaru = new OrderKerja;
            $orderKerjaBaru->order = $request->order;
            $orderKerjaBaru->tanggal = \Carbon\Carbon::now();
            $orderKerjaBaru->pelanggan_id = $request->pelanggan_id;
            $orderKerjaBaru->save();
            $orderKerjaId = $orderKerjaBaru->id;
        } else {
            $orderKerjaId = $cekData->id;
        }

        $subOrderKerjaBaru = new OrderKerjaSub;
        $subOrderKerjaBaru->order_kerja_id = $orderKerjaId;
        $subOrderKerjaBaru->produk_id = 5;
        $subOrderKerjaBaru->qty = $request->qty;
        $subOrderKerjaBaru->deadline = $request->deadline_costum . ' '. \Carbon\Carbon::now()->toTimeString();
        $subOrderKerjaBaru->barang_id = $request->barang_id;
        $subOrderKerjaBaru->harga = $request->harga;
        $subOrderKerjaBaru->total = $request->total;
        $db = Barang::find($request->barang_id);
        $subOrderKerjaBaru->diskon = (isset($request->diskon))?$request->diskon:0;
        $subOrderKerjaBaru->keterangan_sub = 'Nama Produk : ' . $db->nm_barang;
        $subOrderKerjaBaru->keterangan_sub .= '<br />Keterangan : ' . nl2br($request->keterangan);
        $subOrderKerjaBaru->save();

        return redirect()->route('order.show', $orderKerjaId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderKerja  $orderKerja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrderKerjaSub::where('order_kerja_id', $id)->get();
        $order = OrderKerja::find($id);
        $totalan = OrderKerjaSub::select(DB::raw('SUM(total) AS total'))->where('order_kerja_id', '=', $id)->first();
        $editors = Editor::all();
        return view('transaksi.order.order_detail', compact(['data', 'id', 'totalan', 'order','editors']));

        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderKerja  $orderKerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $total = NULL)
    {
        $kakis = Kaki::all();
        $hargas = Harga::all();
        $barangs = Barang::all();
        $editors = Editor::all();
        $members = Pelanggan::all();
        $order = OrderKerja::findOrFail($id);
        $data = OrderKerjaSub::where('order_kerja_id', $id)->get();
        $totalan = OrderKerjaSub::select(DB::raw('SUM(total) AS total'))->where('order_kerja_id', '=', $id)->first();

        return view('transaksi.order.order_edit', compact(['data', 'hargas', 'kakis', 'barangs', 'members', 'order', 'totalan','editors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderKerja  $orderKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderKerja $id)
    {
        $subOrderKerjaBaru = new OrderKerjaSub;
        $subOrderKerjaBaru->order_kerja_id = $id;
        $subOrderKerjaBaru->pekerjaan_id = $request->pekerjaan;
        $subOrderKerjaBaru->finishing = $request->finishing;
        $subOrderKerjaBaru->file = $request->namafile;
        $subOrderKerjaBaru->diskon = (isset($request->diskon))?$request->diskon:0;
        $subOrderKerjaBaru->qty = $request->qty;
        $subOrderKerjaBaru->panjang = $request->panjang;
        $subOrderKerjaBaru->lebar = $request->lebar;
        $dataHarga = Harga::where('pekerjaan_id', '=', $request->pekerjaan)->first();
        $subOrderKerjaBaru->harga = $dataHarga->harga_jual;
        $subOrderKerjaBaru->save();

        return redirect()->route('order.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderKerja  $orderKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderKerja $orderKerja, $id)
    {
        OrderKerja::destroy($id);
        return redirect()->route('order.index')->with('alert-success', 'Data Order Kerja Telah Dihapus!');
    }

    public function destroySubKerja($id)
    {
        $dat = OrderKerjaSub::find($id);
        $idi = $dat->orderKerja->id;
        $da = OrderKerja::find($idi);
        $data = OrderKerjaSub::where('id', $id)->delete();
        $cek = OrderKerjaSub::where('order_kerja_id', $idi)->first();
        if (is_null($cek)) {
            $hpus = OrderKerja::find($idi)->delete();
            return redirect()->route('order.index')->with('alert-success', 'Data Order Kerja Telah Dihapus!');
        }else{
            return redirect()->route('order.show', $da->id);
        }
    }

    /**
     * Update the payment resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePayment(Request $request, $id)
    {   
        if($request->type_pembayaran == null || $request->type_pembayaran == ''){
            return redirect('admin/transaksi/order/' . $id)->with('alert-danger', 'Silahkan Pilih Type Pembayaran!');
        }
        $totalan = OrderKerjaSub::select(DB::raw('SUM(total) AS total'))->where('order_kerja_id', '=', $id)->first();

        $data = OrderKerja::findOrFail($id);
        $data->status_payment = $request->type_pembayaran;
        if ($request->type_pembayaran == "tunai") {
            $data->keterangan  = "Tunai";
            $data->keterangan .= "<br />Total bayar : " . number_format($request->jumlah_bayar);
            $data->keterangan .= "<br />Diskon : " . number_format($request->diskon);
            $data->keterangan .= "<br />Total Akhir : " . number_format($request->total_akhir);
            $data->keterangan .= "<br />Kembalian : " . number_format($request->jumlah_bayar - $request->total_akhir);

        } else if ( $request->type_pembayaran == "transfer") {

            if ($request->hasFile('bukti_transfer')) {

                $gambar = $request->file('bukti_transfer');
                $ext = $gambar->getClientOriginalExtension();
    
                if ($request->file('bukti_transfer')->isValid()) {
                    $nama = "tf_" . $request->type_pembayaran . '_' . $data->order . ".$ext";
                    $path = 'bukti-transfer/';
                    $request->file('bukti_transfer')->move($path, $nama);
                }
            }
            
            $data->keterangan = "Bukti transfer : <a href=" . asset('bukti-transfer') . "/" . $nama . ">Lihat Transfer</a>";

        } else if ( $request->type_pembayaran == "invoice") {
            $data->keterangan  = "Invoice.";
            $data->keterangan .= "<br />Total bayar : "  . number_format($request->jumlah_invoice);
            $data->keterangan .= "<br />Diskon : " . number_format($request->diskon);
            $data->keterangan .= "<br />Total Akhir : " . number_format($request->total_akhir);
            $data->keterangan .= "<br />Nama Penangggung jawab : " . $request->penanggung_jawab;
            $data->keterangan .= "<br />Nama Perusahaan : " . $request->nama_perusahaan;

        } else if ( $request->type_pembayaran == "down payment") {

            $data->keterangan  = "Jumlah DP : Rp " . number_format($request->jumlah_dp);
            $data->keterangan .= "<br />Sisa DP : Rp " . number_format($request->sisa_dp);

        }
        $data->update();

        return redirect()->route('order.print', $id);
    }

    public function load_data(){
        
        return $data = OrderKerja::with('pelanggan')->where('status_payment', '=', 'belum bayar')->orderBy('order', 'desc')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderKerja  $orderKerja
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $data = OrderKerjaSub::with('Barang')->where('order_kerja_id', $id)->get();
        $order = OrderKerja::find($id);
        $totalan = OrderKerjaSub::select(DB::raw('SUM(total) AS total'))->where('order_kerja_id', '=', $id)->first();
        $editors = Editor::all();

        return view('transaksi.nota.nota',  compact('data', 'order', 'totalan', 'editors'));
		// $pdf = PDF::loadview('transaksi.nota.nota',  compact('data', 'order', 'totalan', 'editors'));
		// return $pdf->setPaper('a6', 'landscape')->download('nota-'.$order->order.'.pdf');
    }

    public function print2($id)
    {
        $data = OrderKerjaSub::where('order_kerja_id', $id)->get();
        $order = OrderKerja::find($id);
        $totalan = OrderKerjaSub::select(DB::raw('SUM(total) AS total'))->where('order_kerja_id', '=', $id)->first();
        $editors = Editor::all();

        return view('transaksi.nota.nota-spk',  compact('data', 'order', 'totalan', 'editors'));
        // $pdf = PDF::loadview('transaksi.nota.nota',  compact('data', 'order', 'totalan', 'editors'));
        // return $pdf->setPaper('a6', 'landscape')->download('nota-'.$order->order.'.pdf');
    }

    public function print3($id)
    {
        $data = OrderKerjaSub::where('order_kerja_id', $id)->get();
        $order = OrderKerja::find($id);
        $totalan = OrderKerjaSub::select(DB::raw('SUM(total) AS total'))->where('order_kerja_id', '=', $id)->first();
        $editors = Editor::all();

        try {
            
            $dataGroup = OrderKerjaSub::where('order_kerja_id', $id)->groupBy('produk_id')->get();
        } catch (\Illuminate\Database\QueryException $e) {
            dd("Ada Masalah Silahkan Hubungin Admin");
            // ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION
            
        }
        

        return view('transaksi.nota.spk',  compact('data', 'order', 'totalan', 'editors','dataGroup'));
        // $pdf = PDF::loadview('transaksi.nota.nota',  compact('data', 'order', 'totalan', 'editors'));
        // return $pdf->setPaper('a6', 'landscape')->download('nota-'.$order->order.'.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan() {
        $order = OrderKerja::count();
        $indoor = OrderKerjaSub::where('produk_id', '1')->count();
        $outdoor = OrderKerjaSub::where('produk_id', '2')->count();
        $merchandise = OrderKerjaSub::where('produk_id', '3')->count();
        $print = OrderKerjaSub::where('produk_id', '4')->count();
        $custom = OrderKerjaSub::where('produk_id', '5')->count();
        $hari = OrderKerja::count();
        $invoice = OrderKerja::where('status_payment','invoice')->count();
        $dp = OrderKerja::where('status_payment','down payment')->count();
        $tunai = OrderKerja::where('status_payment','tunai')->count();
        return view('laporan.order.index', compact('order', 'indoor', 'outdoor', 'merchandise', 'print', 'custom', 'hari','invoice','dp','tunai'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanOrder(Request $request) {
        if ( isset($request)) {
            return view('laporan.order.laporan-order');
        } else {
            $tanggal = explode(' / ', $request->periode);
            $data = OrderKerja::whereBetween(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), [$tanggal[0], $tanggal[1]])->orderBy('tanggal', 'desc')->get();
            return view('laporan.order.laporan-order', compact('data'));
        }
    }

    public function laporanHari(Request $request) {
        if ( isset($request)) {
            return view('laporan.order.laporan-hari');
        } else {
            $tanggal = $request->tanggal;
            $jam = explode(' - ', $request->jam);
            $data = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tanggal)->whereBetween(\DB::raw("(DATE_FORMAT(tanggal,'%H'))"), [$jam[0], $jam[1]])->orderBy('tanggal', 'desc')->get();
            return view('laporan.order.laporan-hari', compact('data'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanIndoor() {
        return view('laporan.order.laporan-indoor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanOutdoor() {
        return view('laporan.order.laporan-outdoor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanMerchandise() {
        return view('laporan.order.laporan-merchandise');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanPrint() {
        return view('laporan.order.laporan-print');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanCustom() {
        return view('laporan.order.laporan-custom');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanInvoice() {
        return view('laporan.order.laporan-invoice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanDp() {
        return view('laporan.order.laporan-dp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanTunai() {
        return view('laporan.order.laporan-tunai');
    }

    public function cancel($id)
    {
        
        $order = OrderKerja::find($id);
        $order->update([
            'status_payment'=>'cancel'
        ]);
        return redirect()->back();

        
    }

    public function lihatCancel()
    {
        $data = OrderKerja::where('status_payment', 'cancel')->orderBy('order', 'desc')->get();
        return view('transaksi.order.cancel', compact('data'));
    }

}
