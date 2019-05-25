<?php

namespace App\Http\Controllers;

use App\Models\Kaki;
use App\Models\Harga;
use App\Models\Editor;
use App\Models\Pelanggan;
use App\Models\HargaOutdoor;

use Illuminate\Http\Request;

class HargaOutdoorController extends Controller
{
    
    public function getData( $barang, $pelanggan, $qty, $p, $l, $format_ukuran) {
        if ( is_null($pelanggan) || is_null($barang) || is_null($qty) || is_null($format_ukuran)) {
            return '';
        } else {
            $diskon = '';
            $total = '';
            $harga = '';
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '1')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) || $p == 0 || $l == 0 || is_null($format_ukuran)) {
                $diskon = '';
                $total = '';
                $harga = '';

            } else {
                    $pecah_luas = explode('.', $l);
                    $pecah_panjang = explode('.', $p);
                    switch ($format_ukuran) {
                        case '1': //pembulatan panjang
                            if ($p >= '1.00' ) {
                                if ($pecah_panjang[1] >= '01' && $pecah_panjang[1] <= '50') {
                                    $panjang = $pecah_panjang[0] . '.50';
                                } else if ($pecah_panjang[1] >= '51' && $pecah_panjang[1] <= '99') {
                                    $panjang = $pecah_panjang[0] + 1 . '.00';
                                } else if ($pecah_panjang[1] == '00') {
                                    $panjang = $p;
                                }
                            } else {
                                $panjang = '1.00';
                            }

                            if ($l >= '1.00' ) {
                                $lebar = $l;
                            } else if ($l < '1.00' ) {
                                $lebar = '1.00';
                            }

                            break;
        
                        case '2': //pembulatan lebar
                            if ($l >= '1.00' ) {
                                if ($pecah_luas[1] >= '01' && $pecah_luas[1] <= '50') {
                                    $lebar = $pecah_luas[0] . '.50';
                                } else if ($pecah_luas[1] >= '51' && $pecah_luas[1] <= '99') {
                                    $lebar = $pecah_luas[0] + 1 . '.00';
                                } else if ($pecah_luas[1] == '00') {
                                    $lebar = $l;
                                }
                            } else {
                                $lebar = '1.00';
                            }
                            
                            if ($p >= '1.00' ) {
                                $panjang = $p;
                            } else if ($p < '1.00' ) {
                                $panjang = '1.00';
                            }
                            break;
        
                        case '3': //pembulatan panjang lebar
                        //panjang
                                if ($pecah_panjang[1] >= '01' && $pecah_panjang[1] <= '50' ) {
                                    $panjang = $pecah_panjang[0] . '.50';
                                } else if ($pecah_panjang[1] >= '51' && $pecah_panjang[1] <= '99') {
                                    $panjang = $pecah_panjang[0] + 1 . '.00';
                                } else if ($pecah_panjang[1] == '00') {
                                    $panjang = $p;
                                }
        
                        //lebar
                                if ($pecah_luas[1] >= '01' && $pecah_luas[1] <= '50') {
                                    $lebar = $pecah_luas[0] . '.50';
                                } else if ($pecah_luas[1] >= '51' && $pecah_luas[1] <= '99') {
                                    $lebar = $pecah_luas[0] + 1 . '.00';
                                } else if ($pecah_luas[1] == '00') {
                                    $lebar = $l;
                                }
                            break;
        
                        case '4': //tanpa pembulatan
                            if ($p <= '0.99' && $l <= '0.99') {
                                $panjang = '1.00';
                                $lebar = '1.00';
                            } else if ($p <= '0.99' ) {
                                $panjang = '1.00';
                                $lebar = $l;
                            } else if ($l <= '0.99') {
                                $panjang = $p;
                                $lebar = '1.00';
                            } else {
                                $panjang = $p;
                                $lebar = $l;
                            }
                            break;
                    }
                
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

                    if ( ( $qty <= $data->range_max ) && ( $qty >= $data->range_min ) ) {
                        $total = (($panjang * $lebar) * ( ($qty * $data->harga_jual) - (($qty * $data->harga_jual) * ($data->disc / 100)) ));
                    } else { 
                        $total = 'Tidak set';
                    }

                    $harga = $data->harga_jual * ($panjang * $lebar);
                    $diskon = $data->disc;
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

