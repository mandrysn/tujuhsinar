<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Pelanggan;
use App\Models\HargaCostum;

use Illuminate\Http\Request;

class HargaCostumController extends Controller
{
    

    public function getData($nama_produk, $produk, $pelanggan, $qty){
        if ( is_null($pelanggan)  || is_null($qty) ) {
            $diskon = '-';
            $total = '-';
            $harga = '-';
        } else {
            $diskon = '-';
            $total = '-';
            $harga = '-';
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '5')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                $diskon = '-';
                $total = '-';
                $harga = '-';

            } else { 
               $data = HargaCostum::where('harga_id', $harga->id)
                                ->where('barang_id', '=', $nama_produk)
                                ->first();

                if ( is_null($data) ) {
                    $diskon = '-';
                    $total = '-';
                    $harga = '-';
                } else {
                    $diskon = $data->disc;

                   

                    $total = (($qty * $data->harga_jual) - ( ($qty * $data->harga_jual) * ($data->disc / 100) ));

                    $harga = $data->harga_jual;


                }

              

            }

            $arr = array('diskon' =>$diskon ,'total'=>ceil($total),'harga'=>$harga );
            return $arr;


          
        }
    }

    public function getDiskon($nama_produk, $produk, $pelanggan, $qty)
    {
        if ( is_null($pelanggan) || is_null($nama_produk) || is_null($qty) ) {
            return '-';
        } else {
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '6')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                return '-';
            } else { 
                $data = HargaCostum::where('harga_id', $harga->id)
                                ->where('nama_produk', '=', $nama_produk)
                                
                                ->first();

                if ( is_null($data) ) {
                    return '-';
                } else {
                    return $data->disc;
                }
            }
        }
    }
    public function getTotal($nama_produk, $produk, $pelanggan, $qty)
    {
        if ( is_null($pelanggan) || is_null($nama_produk) || is_null($qty)) {
            return '-';
        } else {
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '6')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                return '-';
            } else { 
                $data = HargaCostum::where('harga_id', $harga->id)
                                ->where('nama_produk', '=', $nama_produk)
                               
                                ->first();

                if ( is_null($data) ) {
                    return '-';
                } else {
                    return ($qty * $data->harga_jual) - ( ($qty * $data->harga_jual) * ($data->disc / 100) );
                }
            }
        }
    }
    public function getHarga($nama_produk, $produk, $pelanggan, $qty)
    {
        if ( is_null($pelanggan) || is_null($nama_produk) || is_null($qty) ) {
            return '-';
        } else {
            $idPelanggan = Pelanggan::findOrFail($pelanggan);
            $harga = Harga::where('produk_id', '=', '6')->where('member_id', '=', $idPelanggan->member_id)->first();

            if ( is_null($harga) ) {
                return '-';
            } else { 
                $data = HargaCostum::where('harga_id', $harga->id)
                                ->where('nama_produk', '=', $nama_produk)
                              
                                ->first();

                if ( is_null($data) ) {
                    return '-';
                } else {
                    return $data->harga_jual;
                }
            }
        }
    }
}
