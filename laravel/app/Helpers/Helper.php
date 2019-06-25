<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\OrderKerja;
use App\Models\OrderKerjaSub;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;


class Helper
{
    /**
     * Creating helpers for getUsername.
     *
     * @return \Illuminate\Support\Facades
     */
    public static function get_username($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return (isset($user->username) ? $user->username : '');
    }

    public static function idLastMember()
    {
        $cari = Pelanggan::withTrashed()->orderby('id', 'desc')->first();
        return sprintf("%06s", $cari->id + 1);
    }

    public static function idMember($id)
    {
        return sprintf("%06s", $id);
    }

    public static function kodeAntrian()
    {
        $cari = OrderKerja::count();
        if($cari == 0 ) {
            $add = 1;
        } else {
            $add = $cari + 1;
        }
        return sprintf("%05s", $add);
    }

    public static function role()
    {
        if (Auth::user()->role == 1) {
            $to = 'admin';
        }elseif(Auth::user()->role == 5){
            $to = 'owner';
        }elseif(Auth::user()->role == 4){
            $to = 'produk';
        }elseif(Auth::user()->role == 3){
            $to = 'kasir';
        }elseif(Auth::user()->role == 2){
            $to = 'order';
        }else{
            return abort(403);
        }
        return $to;
    }

    public static function backButton()
    {
        return URL::previous();
           
    }

    public static function totalOutdoor($id_pelanggan)
    {
        $data = OrderKerjaSub::selectRaw(DB::raw('COUNT(produk_id) AS produk'))
            ->whereExists(function($que) use ($id_pelanggan){
            $que->from('order_kerjas')
                ->whereRaw('order_kerjas.id = order_kerja_subs.order_kerja_id')
                ->where('order_kerja_subs.produk_id', 1)
                ->where('order_kerjas.pelanggan_id', $id_pelanggan); })
            ->count();
        
        return $data;
    }

    public static function totalIndoor($id_pelanggan)
    {
        $data = OrderKerjaSub::selectRaw(DB::raw('COUNT(produk_id) AS produk'))
            ->whereExists(function($que) use ($id_pelanggan){
            $que->from('order_kerjas')
                ->whereRaw('order_kerjas.id = order_kerja_subs.order_kerja_id')
                ->where('order_kerja_subs.produk_id', 2)
                ->where('order_kerjas.pelanggan_id', $id_pelanggan); })
            ->count();
        
        return $data;
    }

    public static function totalPrint($id_pelanggan)
    {
        $data = OrderKerjaSub::selectRaw(DB::raw('COUNT(produk_id) AS produk'))
            ->whereExists(function($que) use ($id_pelanggan){
            $que->from('order_kerjas')
                ->whereRaw('order_kerjas.id = order_kerja_subs.order_kerja_id')
                ->where('order_kerja_subs.produk_id', 4)
                ->where('order_kerjas.pelanggan_id', $id_pelanggan); })
            ->count();
        
        return $data;
    }

    public static function totalAntrian($produk_id)
    {
        $antrian = OrderKerjaSub::selectRaw(DB::raw('COUNT(status_produksi) AS antrian'))
                                        ->where('status_produksi', '1')
                                        ->where('produk_id', $produk_id)
                                        ->join('order_kerjas', function ($join) {
                                            $join->on('order_kerja_subs.order_kerja_id', '=', 'order_kerjas.id')
                                                ->where('order_kerjas.status_payment', '!=', 'belum bayar');
                                            })
										->groupBy('produk_id')
                                        ->first();

        return empty($antrian->antrian) ? "0" : $antrian->antrian;
    }

    public static function totalPrinting($produk_id)
    {
        $printing = OrderKerjaSub::selectRaw(DB::raw('COUNT(status_produksi) AS printing'))
                                        ->where('status_produksi', '2')
                                        ->where('produk_id', $produk_id)
                                        ->join('order_kerjas', function ($join) {
                                            $join->on('order_kerja_subs.order_kerja_id', '=', 'order_kerjas.id')
                                                ->where('order_kerjas.status_payment', '!=', 'belum bayar');
                                            })
										->groupBy('produk_id')
                                        ->first();
                                        
        return empty($printing->printing) ? "0" : $printing->printing;
    }

    public static function tanggalId($tanggal)
    {
        \Carbon\Carbon::setLocale('id');

        switch(\Carbon\Carbon::parse($tanggal)->format('l')) {
            case 'Monday' :
                $hari = 'Senin';
                break;
            case 'Tuesday' :
                $hari = 'Selasa';
                break;
            case 'Wednesday' :
                $hari = 'Rabu';
                break;
            case 'Thursday' :
                $hari = 'Kamis';
                break;
            case 'Friday' :
                $hari = 'Jumat';
                break;
            case 'Saturday' :
                $hari = 'Sabtu';
                break;
            default:
                $hari = 'Minggu';
        }

        switch(\Carbon\Carbon::parse($tanggal)->format('F')) {
            case 'January' :
                $bulan = 'Jan';
                break;
            case 'February' :
                $bulan = 'Feb';
                break;
            case 'March' :
                $bulan = 'Maret';
                break;
            case 'April' :
                $bulan = 'April';
                break;
            case 'May' :
                $bulan = 'Mei';
                break;
            case 'June' :
                $bulan = 'Juni';
                break;
            case 'July' :
                $bulan = 'Juli';
                break;
            case 'August' :
                $bulan = 'Agst';
                break;
            case 'September' :
                $bulan = 'Sept';
                break;
            case 'October' :
                $bulan = 'Okt';
                break;
            case 'November' :
                $bulan = 'Nov';
                break;
            default:
                $bulan = 'Dec';
        }


        return $hari . ', ' .
            \Carbon\Carbon::parse($tanggal)->format('d-') .
            $bulan .
            \Carbon\Carbon::parse($tanggal)->format('-Y') . ' - ' . \Carbon\Carbon::parse($tanggal)->format('H:i');
    }

    public static function get_type($t)
    {   
        $typenya = "Pcs";
       switch ($t) {
           case 1:
                $typenya = "Meter";
               break;
            case 2:
              $typenya = "Lembar";
               break;
           default:
               $typenya = "Pcs";
               break;
       }
       return $typenya;
    }

    public static function keteranganSatuBaris($keterangan)
    {
        $hasil = str_replace('<br />',' , ', $keterangan);
        return $hasil;
    }

    public static function getUkuran($keterangan)
    {
        $data = explode('<br />', $keterangan);
        $hasil = explode(':', $data[0]);
   
        if($hasil[0] != 'Ukuran '){
            $hasil = explode(':', $data[1]);

        }
        $ukuran = @$hasil[1];
        return $ukuran;
    }

  

}