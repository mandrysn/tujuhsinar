<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Pelanggan;
use App\Models\HargaMerchant;

use Illuminate\Http\Request;

class HargaMerchantController extends Controller
{   

    public function getData( $barang, $pelanggan, $qty){
        if ( is_null($pelanggan) || is_null($barang) || is_null($qty) ) {
            $diskon = '-';
            $total = '-';
            $harga = '-';
        } else {
            $diskon = '-';
            $total = '-';
            $harga = '-';
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '3')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                $diskon = '-';
                $total = '-';
                $harga = '-';

            } else { 
                $data = HargaMerchant::where('harga_id', $harga->id)
                                
                                ->where('barang_id', '=', $barang)
                                
                                ->where('range_min', '<=', $qty)
                                ->where('range_max', '>=', $qty)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '-';
                    $total = '-';
                    $harga = '-';
                } else {
                
                    if( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        $total = (($qty * $data->harga_jual) - ( ($qty * $data->harga_jual) * ($data->disc / 100) ));

                    } else { 
                        $total = 'Tidak set';
                    }

                    $diskon = $data->disc;
                    $harga = $data->harga_jual;
                }

              

            }

            $arr = array('diskon' =>$diskon ,'total'=>ceil($total),'harga'=>$harga );
            return $arr;

        }
    }

}
