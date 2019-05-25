<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Piutang;
use App\Models\Pelanggan;
use App\Models\OrderKerja;

use App\Helpers\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helper::get_username(1);

        $tet = $this->perhari();
        $order = OrderKerja::count();
        $tagih = Piutang::where('status_pembayaran', 'Utang')->count();
        $pel = Pelanggan::count();
        $trans = Piutang::sum('sudah_bayar');

        return view('dashboard', compact('order', 'tagih', 'pel', 'trans', 'tet'));
    }

    public function perhari()
    {
        $tgl[0] = date('Y-m-d');
        $order[0] = OrderKerja::where('tanggal', $tgl[0])->count();
        $tgl[1] = date('Y-m-d', strtotime('-1 days'));
        $order[1] = OrderKerja::where('tanggal', $tgl[1])->count();
        $tgl[2] = date('Y-m-d', strtotime('-2 days'));
        $order[2] = OrderKerja::where('tanggal', $tgl[2])->count();
        $tgl[3] = date('Y-m-d', strtotime('-3 days'));
        $order[3] = OrderKerja::where('tanggal', $tgl[3])->count();
        $tgl[4] = date('Y-m-d', strtotime('-4 days'));
        $order[4] = OrderKerja::where('tanggal', $tgl[4])->count();
        $tgl[5] = date('Y-m-d', strtotime('-5 days'));
        $order[5] = OrderKerja::where('tanggal', $tgl[5])->count();
        $tgl[6] = date('Y-m-d', strtotime('-6 days'));
        $order[6] = OrderKerja::where('tanggal', $tgl[6])->count();
        
        return $order;
    }

    /**
     * Show the selecting and directing a role user.
     *
     * @return \Illuminate\Http\Response
     */
    public function cek()
    {
        if (Auth::user()->role == 1) {
            $to = 'dash';
        } else if (Auth::user()->role == 5) {
            $to = 'dash';
        } else if (Auth::user()->role == 6) {
            return redirect()->route('transaksi.produksi.outdoor');
        } else if (Auth::user()->role == 7) {
            return redirect()->route('transaksi.produksi.indoor');
        } else if (Auth::user()->role == 8) {
            return redirect()->route('transaksi.produksi.merchant');
        } else if (Auth::user()->role == 9) {
            return redirect()->route('transaksi.produksi.print');
        } else if (Auth::user()->role == 10) {
            return redirect()->route('transaksi.produksi.costum');
        } else if (Auth::user()->role == 3) {
            $to = 'order.index';
        } else if (Auth::user()->role == 2) {
            $to = 'order.index';
        } else {
            $to = 'dash';
        }
        return redirect()->route($to);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
