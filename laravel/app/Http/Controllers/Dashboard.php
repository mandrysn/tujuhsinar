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
        
        // $l = '0.50'; $p = '4.00'; $qty = '1';
        // $data = \App\Models\HargaOutdoor::where('harga_id', 1)
        // ->where('barang_id', 10)
        // ->where('range_min', '<=', 1)
        // ->where('range_max', '>=', 15)
        // ->first();
        // $cari_ukuran = \App\Models\UkuranBahanDetail::where('barang_id', $data->barang_id)->orderBy('ukuran_bahan_id', 'ASC')->get();

        // $total_panjang = [];
        // $harga_panjang = [];
        // $total_lebar = [];
        // $harga_lebar = [];

        // foreach($cari_ukuran as $key => $cari) {

        //     $cek_ukuran = \App\Models\UkuranBahan::where('id', $cari->ukuran_bahan_id)->orderBy('range_min', 'ASC')->get();

        //     foreach ($cek_ukuran as $test) {

        //         echo $test->range_min . ' - ' . $test->range_max . '--' . $test->id . '<br />';
        //         if ( $l <= $test->range_max && $p <= $test->range_max ) {

        //             $rumus = 'ukuran kurang dari range';
        //             if ($l >= $test->range_min && $l <= $test->range_max && ($l != $p)) {
        //                 $rumus = ' a ' . $p . ' ' . $l . ' ' . $test->nm_ukuran_bahan . ' ' . $test->range_max .'<br />';
        //                 $lebar = $test->range_max;
        //                 $harga_lebar = ( ($data->harga_jual * ($p * $lebar)) - ($data->harga_jual * ($data->disc / 100)));
        //                 $total_lebar = (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
        //             } else if ($p >= $test->range_min && $p <= $test->range_max && ($l != $p)) {
        //                 $rumus = 'b ' . $l . ' ' . $p . ' ' . $test->nm_ukuran_bahan . ' ' . $test->range_max  . '<br />';
        //                 $panjang = $test->range_max;
        //                 $harga_panjang = ( ($data->harga_jual * ($panjang * $l)) - ($data->harga_jual * ($data->disc / 100)));
        //                 $total_panjang = (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
        //             } else if ( ($l >= $test->range_min && $l <= $test->range_max) && ($p >= $test->range_min && $p <= $test->range_max) && ($l == $p)) {
        //                 $rumus = 'c ' . $l . ' ' . $p . ' ' . $test->nm_ukuran_bahan . ' ' . $test->range_max .'<br />';
        //                 $lebar = $l;
        //                 $panjang = $p;

        //                 $harga_lebar = ( ($data->harga_jual * ($l * $p)) - ($data->harga_jual * ($data->disc / 100)) );
        //                 $total_lebar = (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));

        //                 $harga_panjang = ( ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100)));
        //                 $total_panjang = (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
        //             }
        //             break;
        //         } else if ( $p > $test->range_max && $l <= $test->range_max && $l >= $test->range_min) {
        //             $lebar = $test->range_max;
        //             $panjang = $p;
                    
        //             $rumus = 'ukuran p lebih dari range';
        //             $rumus .= ' dP ' . $panjang . ' ' . $l . '<br />';

                    
        //             $harga_lebar = ($data->harga_jual * ($lebar * $panjang)) - ($data->harga_jual * ($data->disc / 100));
        //             $total_lebar = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                    
        //             $harga_panjang = ($data->harga_jual * ($panjang * $lebar)) - ($data->harga_jual * ($data->disc / 100));
        //             $total_panjang = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
        //             break;
        //         } else if ( $l > $test->range_max && $p <= $test->range_max ) {
                    
        //             $panjang = $test->range_max;
        //             $lebar = $l;

        //             $rumus = 'ukuran L lebih dari range';
        //             $rumus .= ' dL ' . $panjang . ' ' . $lebar . '<br />';

                    
        //             $harga_lebar = ($data->harga_jual * ($lebar * $panjang)) - ($data->harga_jual * ($data->disc / 100));
        //             $total_lebar = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                    
        //             $harga_panjang = ($data->harga_jual * ($panjang * $lebar)) - ($data->harga_jual * ($data->disc / 100));
        //             $total_panjang = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
        //             break;
        //         } else if ( $p > $test->range_max && $l > $test->range_max) {
        //             $rumus = 'keduanya lebih dari range';

        //             $harga_lebar = ($data->harga_jual * ($l * $p)) - ($data->harga_jual * ($data->disc / 100));
        //             $total_lebar = ($p * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );

        //             $harga_panjang = ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100));
        //             $total_panjang = ($p * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
        //             break;
        //         }
        //         echo $total_panjang . '<br />';
        //     }
        // }

        // echo $rumus . '<br />';
        // echo '<br /><br /><br />' . $harga_panjang . '<=p || l=> ' . $harga_lebar . '<br />';
        // echo '<br /><br /><br />' . $total_panjang . '<=p || l=> ' . $total_lebar . '<br />';
        // $harga = $harga_panjang > $harga_lebar ?  $harga_lebar : $harga_panjang;
        // $total = $total_panjang > $total_lebar ?  $total_lebar : $total_panjang;
        // return $total;
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
        $order = [];
        $tgl[0] = date('Y-m-d');
        $order[0] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[0])->count();
        $tgl[1] = date('Y-m-d', strtotime('-1 days'));
        $order[1] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[1])->count();
        $tgl[2] = date('Y-m-d', strtotime('-2 days'));
        $order[2] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[2])->count();
        $tgl[3] = date('Y-m-d', strtotime('-3 days'));
        $order[3] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[3])->count();
        $tgl[4] = date('Y-m-d', strtotime('-4 days'));
        $order[4] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[4])->count();
        $tgl[5] = date('Y-m-d', strtotime('-5 days'));
        $order[5] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[5])->count();
        $tgl[6] = date('Y-m-d', strtotime('-6 days'));
        $order[6] = OrderKerja::where(\DB::raw("(DATE_FORMAT(tanggal,'%Y-%m-%d'))"), $tgl[6])->count();
        
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
