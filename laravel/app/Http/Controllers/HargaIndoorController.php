<?php

namespace App\Http\Controllers;

use App\Models\Kaki;
use App\Models\Harga;
use App\Models\Editor;
use App\Models\Pelanggan;
use App\Models\HargaIndoor;
use App\Models\UkuranBahanDetail;
use Illuminate\Http\Request;

class HargaIndoorController extends Controller
{   
    public function getData( $barang, $pelanggan, $qty, $p, $l) {
        if ( is_null($pelanggan) || is_null($barang) || is_null($qty)) {
            return '-';
        } else {
            $diskon = '-';
            $total = '-';
            $harga = '-';
            $tp = 0;

            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '2')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) || $p == 0 || $l == 0 ) {
                $diskon = '0';
                $total = '0';
                $harga = '0';

            } else { 
                $data = HargaIndoor::where('harga_id', $harga->id)
                                ->where('barang_id', '=', $barang)
                                ->where('range_min', '<=', $qty)
                                ->where('range_max', '>=', $qty)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '0';
                    $total = '0';
                    $harga = '0';
                } else {

                    if ( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        $cari_ukuran = UkuranBahanDetail::where('barang_id', $data->barang_id)->orderBy('ukuran_bahan_id', 'ASC')->get();
                        $total_panjang = (($p * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                        $harga_panjang = ( ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100)));
                        $total_lebar = (($p * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                        $harga_lebar = ( ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100)));

                        foreach($cari_ukuran as $key => $cari) {

                            $cek_ukuran = UkuranBahan::where('id', $cari->ukuran_bahan_id)->orderBy('range_min', 'ASC')->get();
                
                            foreach ($cek_ukuran as $test) {
                
                                if ( $l <= $test->range_max && $p <= $test->range_max ) {
                
                                    if ($l >= $test->range_min && $l <= $test->range_max && ($l != $p)) {
                                        $lebar = $test->range_max;
                                        $harga_lebar = ( ($data->harga_jual * ($p * $lebar)) - ($data->harga_jual * ($data->disc / 100)));
                                        $total_lebar = (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                                    } else if ($p >= $test->range_min && $p <= $test->range_max && ($l != $p)) {
                                        $panjang = $test->range_max;
                                        $harga_panjang = ( ($data->harga_jual * ($panjang * $l)) - ($data->harga_jual * ($data->disc / 100)));
                                        $total_panjang = (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                                    } else if ( ($l >= $test->range_min && $l <= $test->range_max) && ($p >= $test->range_min && $p <= $test->range_max) && ($l == $p)) {
                                        $lebar = $l;
                                        $panjang = $p;
                
                                        $harga_lebar = ( ($data->harga_jual * ($l * $p)) - ($data->harga_jual * ($data->disc / 100)) );
                                        $total_lebar = (($p * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                
                                        $harga_panjang = ( ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100)));
                                        $total_panjang = (($panjang * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                                    }
                                } else if ( $p > $test->range_max && $l <= $test->range_max && $l >= $test->range_min) {

                                    $lebar = $test->range_max;
                                    $panjang = $p;
                                    
                                    $harga_lebar = ($data->harga_jual * ($lebar * $panjang)) - ($data->harga_jual * ($data->disc / 100));
                                    $total_lebar = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                                    
                                    $harga_panjang = ($data->harga_jual * ($panjang * $lebar)) - ($data->harga_jual * ($data->disc / 100));
                                    $total_panjang = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                                } else if ( $l > $test->range_max && $p <= $test->range_max ) {
                                    
                                    $panjang = $test->range_max;
                                    $lebar = $l;
                                    
                                    $harga_lebar = ($data->harga_jual * ($lebar * $panjang)) - ($data->harga_jual * ($data->disc / 100));
                                    $total_lebar = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                                    
                                    $harga_panjang = ($data->harga_jual * ($panjang * $lebar)) - ($data->harga_jual * ($data->disc / 100));
                                    $total_panjang = ($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                                } else if ( $p > $test->range_max && $l > $test->range_max) {
                
                                    $harga_lebar = ($data->harga_jual * ($l * $p)) - ($data->harga_jual * ($data->disc / 100));
                                    $total_lebar = ($p * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                
                                    $harga_panjang = ($data->harga_jual * ($p * $l)) - ($data->harga_jual * ($data->disc / 100));
                                    $total_panjang = ($p * $l) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) );
                                }
                            }
                        }
                        $harga = $harga_panjang > $harga_lebar ?  $harga_lebar : $harga_panjang;
                        $total = $total_panjang > $total_lebar ?  $total_lebar : $total_panjang;
                    } else { 
                        $total = 'Tidak set';
                    }
                }
            }

            $arr = array('diskon' => $diskon, 'total'=> round($total), 'harga' => round($harga));
            return $arr;
          
        }
    }
    
    public function getKaki(Request $r)
    {
        if ($r->ajax()) {
            $sumberDatas = Kaki::where('member_id', '=', $r->id)->where('produk_id', '=', '2')->get();
            
            return response()->json($sumberDatas->toArray());
        }
    }

    public function getFinishing(Request $r)
    {
        if ($r->ajax()) {
            $sumberDatas = Editor::where('member_id', '=', $r->id)->where('produk_id', '=', '2')->get();
            
            return response()->json($sumberDatas->toArray());
        }
    }

}
