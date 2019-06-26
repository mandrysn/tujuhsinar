<?php

namespace App\Http\Controllers;

use App\Models\Piutang;
use App\Models\OrderKerja;
use App\Models\OrderKerjaSub;

use Illuminate\Http\Request;

class PiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderKerja::where('status_payment', '=', 'invoice')->get();
        return view('transaksi.invoice.invoice', compact('data'));
    }
	
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function bayar(OrderKerja $orderKerja)
    {
        $orderKerja->status_payment = 'lunas';
		$orderKerja->update();
        return redirect()->route('order.show', $orderKerja->id);
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
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderKerja::where('id', $id)->first();
        $data = OrderKerjaSub::where('order_kerja_id', $id)->get();
        $tipe = ['Tunai', 'Transfer', 'Debit'];
        return view('piutang.show', compact('order', 'data', 'tipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function edit(Piutang $piutang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderkerja = OrderKerja::find($id);
        if ($request->bayar > $orderkerja->jumhar - $orderkerja->piutang->sudah_bayar) $bayar = $orderkerja->jumhar;
        else $bayar = $request->bayar + $orderkerja->piutang->sudah_bayar;
        $status = ($bayar >= $orderkerja->jumhar) ? 'Lunas' : 'Utang' ;

        $piutang = Piutang::where('order_kerja_id', $id)->update([
            'sudah_bayar'       => $bayar,
            'tipe_pembayaran'   => $request->tipe,
            'status_pembayaran' => $status
        ]);
        return redirect()->route('order.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $data = OrderKerjaSub::findOrFail($id);
        $data->status_produksi = $data->status_produksi + 1;
        $data->update();

        return redirect('admin/transaksi/piutang');
    }
}
