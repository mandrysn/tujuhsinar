<?php

namespace App\Http\Controllers;

use App\Models\Kaki;
use App\Models\Harga;
use App\Models\Editor;
use App\Models\Pelanggan;
use App\Models\UkuranBahan;
use App\Models\HargaOutdoor;
use App\Models\UkuranBahanDetail;

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
                        $cari_ukuran = UkuranBahanDetail::where('barang_id', $data->barang_id)->get();

                        $total_panjang = [];
                        $harga_panjang = [];
                        $total_lebar = [];
                        $harga_lebar = [];

                        foreach($cari_ukuran as $cari) {
                            $cek_ukuran = UkuranBahan::where('id', $cari->ukuran_bahan_id)->get();

                            foreach ($cek_ukuran as $test) {
                                
                                if ($l >= $test->range_min && $l <= $test->range_max && ($l != $p)) {
                                    $lebar = $test->range_max;
                                    array_push($harga_lebar, ( ($data->harga_jual * ($p * $lebar)) - ($data->harga_jual * ($data->disc / 100))) );
                                    array_push($total_lebar, (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
                                } else if ($p >= $test->range_min && $p <= $test->range_max && ($l != $p)) {
                                    $panjang = $test->range_max;
                                    array_push($harga_panjang, ( ($data->harga_jual * ($panjang * $l)) - ($data->harga_jual * ($data->disc / 100))) );
                                    array_push($total_panjang, (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
                                } else if ( ($l >= $test->range_min && $l <= $test->range_max) && ($p >= $test->range_min && $p <= $test->range_max) && ($l == $p)) {
                                    $lebar = $l;
                                    $panjang = $p;
                                    array_push($harga_lebar, ( ($data->harga_jual * ($l * $p)) - ($data->harga_jual * ($data->disc / 100))) );
                                    array_push($total_lebar, (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
                                    array_push($harga_panjang, ( ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100))) );
                                    array_push($total_panjang, (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) )));
                                }
                            }
                        }
                        $harga = $harga_panjang[0] > $harga_lebar[0] ?  $harga_lebar[0] : $harga_panjang[0];
                        $total = $total_panjang[0] > $total_lebar[0] ?  $total_lebar[0] : $total_panjang[0];
                    } else { 
                        $total = 'Tidak set';
                    }

                }

            }

            $arr = array('diskon' => $diskon, 'total' => $total, 'harga' => $harga);
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

