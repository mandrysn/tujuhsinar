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
        // $l = '2.10'; $p = '1.56'; $qty = '1';
        // $data = \App\Models\HargaOutdoor::where('harga_id', 1)
        // ->where('barang_id', 9)
        // ->where('range_min', '<=', 1)
        // ->where('range_max', '>=', 15)
        // ->first();
        // $cari_ukuran = \App\Models\UkuranBahanDetail::where('barang_id', $data->barang_id)->get();


        // $total_panjang = [];
        // $harga_panjang = [];
        // $total_lebar = [];
        // $harga_lebar = [];

        // foreach($cari_ukuran as $cari) {
        //     $cek_ukuran = \App\Models\UkuranBahan::where('id', $cari->ukuran_bahan_id)->get();

        //     foreach ($cek_ukuran as $test) {
                
        //         if ($l >= $test->range_min && $l <= $test->range_max && ($l != $p)) {
        //             echo $l . ' ' . $test->nm_ukuran_bahan . ' ' . $test->range_max .'<br />';
        //             $lebar = $test->range_max;
        //             array_push($harga_lebar, ( ($data->harga_jual * ($p * $lebar)) - ($data->harga_jual * ($data->disc / 100))) );
        //             array_push($total_lebar, (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
        //         } else if ($p >= $test->range_min && $p <= $test->range_max && ($l != $p)) {
        //             echo $p . ' ' . $test->nm_ukuran_bahan . ' ' . $test->range_max  . '<br />';
        //             $panjang = $test->range_max;
        //             array_push($harga_panjang, ( ($data->harga_jual * ($panjang * $l)) - ($data->harga_jual * ($data->disc / 100))) );
        //             array_push($total_panjang, (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
        //         } else if ( ($l >= $test->range_min && $l <= $test->range_max) && ($p >= $test->range_min && $p <= $test->range_max) && ($l == $p)) {
        //             echo $l . ' ' . $p . ' ' . $test->nm_ukuran_bahan . ' ' . $test->range_max .'<br />';
        //             $lebar = $l;
        //             $panjang = $p;
        //             array_push($harga_lebar, ( ($data->harga_jual * ($l * $p)) - ($data->harga_jual * ($data->disc / 100))) );
        //             array_push($total_lebar, (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
        //             array_push($harga_panjang, ( ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100))) );
        //             array_push($total_panjang, (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
        //         }
        //     }
        // }
        // echo '<br /><br /><br />' . $harga_panjang[0] . '<=p || l=> ' . $harga_lebar[0] . '<br />';
        // echo '<br /><br /><br />' . $total_panjang[0] . '<=p || l=> ' . $total_lebar[0] . '<br />';
        // return $total_panjang[0] > $total_lebar[0] ?  $total_lebar[0] : $total_panjang[0];
        // dd();

        Helper::get_username(1);

        $tet = $this->perhari();
        $order = OrderKerja::count();
        $tagih = Piutang::where('status_payment', 'Utang')->count();
        $pel = Pelanggan::count();
        $trans = Piutang::sum('status_payment');

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
