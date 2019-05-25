<?php

namespace App\Http\Controllers;

use Session;

use App\Models\OrderKerjaSub;

use App\Helpers\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderKerjaSub::selectRaw(DB::raw('COUNT(produk_id) AS produk, produk_id'))
                             ->where('status_produksi', '<', '3')
                             ->join('order_kerjas', function ($join) {
                                $join->on('order_kerja_subs.order_kerja_id', '=', 'order_kerjas.id')
                                    ->where('order_kerjas.status_payment', '!=', 'belum bayar');
                                })
                             ->groupBy('produk_id')
                             ->get();
                             
        return view('transaksi.produksi.produksi', compact('data'));
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
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show($uri)
    {
        if ($uri == 'outdoor') {
            $produk = '1';

        } else if ($uri == 'indoor') {
            $produk = '2';
            
        } else if ($uri == 'merchant') {
            $produk = '3';
            
        } else if ($uri == 'print') {
            $produk = '4';
            
        } else if ($uri == 'costum') {
            $produk = '5';

        } else {
            return 'Are You Lost ?';

        }
        $data = OrderKerjaSub::where('status_produksi', '<', 3)->where('produk_id', $produk)
                                ->join('order_kerjas', function ($join) {
                                $join->on('order_kerja_subs.order_kerja_id', '=', 'order_kerjas.id')
                                    ->where('order_kerjas.status_payment', '!=', 'belum bayar');
                                })
                                ->get();

        return view('transaksi.produksi.produksi_detail', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function showOutdoor()
    {
        $data = OrderKerjaSub::where('status_produksi', '<', 3)->where('produk_id', 1)
                                ->join('order_kerjas', function ($join) {
                                $join->on('order_kerja_subs.order_kerja_id', '=', 'order_kerjas.id')
                                    ->where('order_kerjas.status_payment', '!=', 'belum bayar');
                                })
                                ->get();

        return view('transaksi.produksi.produksi_detail', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function showIndoor()
    {
        $data = OrderKerjaSub::where('status_produksi', '<', 3)->where('produk_id', 2)
                                ->join('order_kerjas', function ($join) {
                                $join->on('order_kerja_subs.order_kerja_id', '=', 'order_kerjas.id')
                                    ->where('order_kerjas.status_payment', '!=', 'belum bayar');
                                })
                                ->get();

        return view('transaksi.produksi.produksi_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produksi  $produksi
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
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produksi $produksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produksi $produksi)
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

        if ($data->produk_id == '1') {
            $produk = 'outdoor';

        } else if ($data->produk_id == '2') {
            $produk = 'indoor';
            
        } else if ($data->produk_id == '3') {
            $produk = 'merchant';
            
        } else if ($data->produk_id == '4') {
            $produk = 'print';
            
        } else if ($data->produk_id == '5') {
            $produk = 'costum';

        } else {
            return 'Are You Lost ?';

        }

        return redirect('admin/transaksi/produksi/' . $produk);
    }
}
