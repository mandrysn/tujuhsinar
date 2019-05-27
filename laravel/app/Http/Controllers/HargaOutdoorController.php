<?php

namespace App\Http\Controllers;

use App\Models\Kaki;
use App\Models\Harga;
use App\Models\Editor;
use App\Models\Pelanggan;
use App\Models\UkuranBahan;
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
            $harga = Harga::where('produk_id', '1')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) || $p == 0 || $l == 0 ) {
                $diskon = '';
                $total = '';
                $harga = '';

            } else {
                
                $data = HargaOutdoor::where('harga_id', $harga->id)
                                ->where('barang_id', $barang)
                                ->where('range_min', '<=', $qty)
                                ->where('range_max', '>=', $qty)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '';
                    $total = '';
                    $harga = '';
                } else {

                    // cek jumlah quantity dengan range harga
                    if ( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        // cari ukuran bahan yang sesuai dengan barang dan produk
                        $cek_ukuran = UkuranBahan::where('barang_id', $barang)->where('produk_id', '1')->get();
                        // array harga dan total
                        $total_lebar = [];
                        $harga_lebar = [];
                        $total_panjang = [];
                        $harga_panjang = [];
                        foreach($cek_ukuran as $key => $tmp) {
                            // mencari ukuran yg akan digunakan untuk bahan sesuai dengan p atau l pesanan
                            if ($l >= $tmp->range_min && $l <= $tmp->range_max) {
                                // mengambil ukuran max untuk lebar dari ukuran bahan yg akan digunakan
                                $lebar = $tmp->range_max;
        
                                array_push($harga_lebar, ( ($data->harga_jual * ($p * $lebar)) - ($data->harga_jual * ($data->disc / 100))) );
                                array_push($total_lebar, (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
                            }
                            else if ($p >= $tmp->range_min && $p <= $tmp->range_max) {
                                // mengambil ukuran max untuk panjang dari ukuran bahan yg akan digunakan
                                $panjang = $tmp->range_max;
        
                                array_push($harga_panjang, ( ($data->harga_jual * ($panjang * $l)) - ($data->harga_jual * ($data->disc / 100))) );
                                array_push($total_panjang, (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
                            }
                            
                        }
                        $diskon = $data->disc;
                        $total = $total_panjang[0] > $total_lebar[0] ?  $total_lebar[0] : $total_panjang[0];
                        $harga = $harga_panjang[0] > $harga_lebar[0] ?  $harga_lebar[0] : $harga_panjang[0];
                    } else { 
                        $total = 'Tidak set';
                    }

                }

            }

            $arr = array('diskon' => $diskon, 'total' => ceil($total), 'harga'=>ceil($harga));
            return $arr;
          
        }
    }

    public function getKaki(Request $r)
    {
        if ($r->ajax()) {
            $sumberDatas = Kaki::where('member_id', '=', $r->id)->where('produk_id', '=', '1')->get();
            
            return response()->json($sumberDatas->toArray());
        }
    }

    public function getFinishing(Request $r)
    {
        if ($r->ajax()) {
            $sumberDatas = Editor::where('member_id', '=', $r->id)->where('produk_id', '=', '1')->get();
            
            return response()->json($sumberDatas->toArray());
        }
    }
}

