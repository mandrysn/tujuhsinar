<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Pelanggan;
use App\Models\HargaOutdoor;

use Illuminate\Http\Request;

class HargaOutdoorController extends Controller
{
    
    public function getData( $barang, $pelanggan, $qty, $p, $l) {
        if ( is_null($pelanggan) || is_null($barang) || is_null($qty) ) {
            return '';
        } else {
            $diskon = '';
            $total = '';
            $harga = '';
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '1')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) || $p == 0 || $l == 0) {
                $diskon = '';
                $total = '';
                $harga = '';

            } else { 
                $data = HargaOutdoor::where('harga_id', $harga->id)
                                ->where('barang_id', '=', $barang)
                                ->where('range_min', '<=', $qty)
                                ->where('range_max', '>=', $qty)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '';
                    $total = '';
                    $harga = '';
                } else {
                    $luas = (int)$p * (int)$l;

                    if ( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        $total = ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ) * ($p * $l);
                    } else { 
                        $total = 'Tidak set';
                    }

                    $harga = $data->harga_jual * ($p * $l);
                    $diskon = $data->disc;
                }

            }

            $arr = array('diskon'=>$diskon, 'total'=>ceil($total), 'harga'=>$harga);
            return $arr;
          
        }
    }
}

