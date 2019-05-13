<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\HargaPrint;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class HargaPrintController extends Controller
{
    public function getData( $barang, $pelanggan, $qty, $ukuran, $tipe_print){
        if ( is_null($pelanggan) || is_null($barang) || is_null($qty) ) {
            $diskon = '-';
            $total = '-';
            $harga = '-';

        } else {
            $diskon = '-';
            $total = '-';
            $harga = '-';
            
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '4')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                $diskon = '-';
                $total = '-';
                $harga = '-';

            } else { 
                $data = HargaPrint::where('harga_id', $harga->id)
                                ->where('barang_id', '=', $barang)
                                ->where('tipe_print', '=', $tipe_print)
                                ->where('ukuran', '=', $ukuran)
                                ->where('range_min', '<=', $qty)
                                ->where('range_max', '>=', $qty)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '-';
                    $total = '-';
                    $harga = '-';
                } else {
                    
                        $ukur = '';
                        switch($ukuran) {
                            case "1":
                                $ukur = 0.210 * 0.297;
                                break;
                            case "2":
                                $ukur = 0.215 * 0.33;
                                break;
                            case "3":
                                $ukur = 0.297 * 0.420;
                                break;
                            default:
                                $ukur = 0.00;
                                break;
                        }

                    if( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        $total = (($qty * $data->harga_jual) - ( ($qty * $data->harga_jual) * ($data->disc / 100) )) * $ukur;

                    } else { 
                        $total = 'Tidak set';
                    }

                    $harga = $data->harga_jual;
                    $diskon = $data->disc;
                }

            }

            $arr = array('diskon' => $diskon, 'total' => ceil($total), 'harga' => $harga );
            return $arr;          
        }
    }
}
