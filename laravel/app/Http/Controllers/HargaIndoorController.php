<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Pelanggan;
use App\Models\HargaIndoor;

use Illuminate\Http\Request;

class HargaIndoorController extends Controller
{   

    public function getData( $barang, $pelanggan, $qty, $p, $l, $tipe_print) {
        if ( is_null($pelanggan) || is_null($barang) || is_null($qty) || is_null($tipe_print)) {
            return '-';
        } else {
            $diskon = '-';
            $total = '-';
            $harga = '-';
            $tp = 0;

            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '2')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                $diskon = '-';
                $total = '-';
                $harga = '-';

            } else { 
                $data = HargaIndoor::where('harga_id', $harga->id)
                                ->where('barang_id', '=', $barang)
                                ->where('tipe_print', '=', $tipe_print)
                                ->where('range_min', '<=', $qty)
                                ->where('range_max', '>=', $qty)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '-';
                    $total = '-';
                    $harga = '-';
                } else {
                    $luas = (int)$p*(int)$l;

                    if( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        $total = ((($qty * $data->harga_jual) - ( ($qty * $data->harga_jual) * ($data->disc / 100) )) * ($p * $l));

                    } else { 
                        $total = 'Tidak set';
                    }

                    $diskon = $data->disc;
                    $harga = $data->harga_jual * ($p * $l);
   
                }
            }

            $arr = array('diskon'=>$diskon, 'total'=>ceil($total), 'harga'=>$harga);
            return $arr;
          
        }
    }

}
