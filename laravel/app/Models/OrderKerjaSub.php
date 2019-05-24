<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderKerjaSub extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
  
    /*
     * variable static untuk produksi
    */
    public static $produksi_a = '1';
    public static $produksi_b = '2';
    public static $produksi_c = '3';

    public function getProduksiAttribute()
    {
        $label = [
            OrderKerjaSub::$produksi_a  => 'Antrian',
            OrderKerjaSub::$produksi_b  => 'Printing',
            OrderKerjaSub::$produksi_c  => 'Diambil',
        ];
        return $label[$this->status_produksi];
    }

    /**
     * variable static untuk produk
     */
    public static $outdoor = '1';
    public static $indoor      = '2';
    public static $merchant    = '3';
    public static $print      = '4';
    public static $costum     = '5';
    
    public function OrderKerja()
    {
    	return $this->belongsTo(OrderKerja::class);
    }
    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function getNamaProdukAttribute()
    {
        $label = [
            OrderKerjaSub::$outdoor  => 'Outdoor',
            OrderKerjaSub::$indoor  => 'Indoor',
            OrderKerjaSub::$merchant  => 'Merchandise',
            OrderKerjaSub::$print  => 'Print A3',
            OrderKerjaSub::$costum  => 'Costum'
        ];
        return $label[$this->produk_id];
    }

    public function getTglDeadlineAttribute($tgl_deadline)
    {   
        $tgl_deadline = $this->deadline;
        \Carbon\Carbon::setLocale('id');

        switch(\Carbon\Carbon::parse($tgl_deadline)->format('l')) {
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

        switch(\Carbon\Carbon::parse($tgl_deadline)->format('F')) {
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

        return $hari . ', ' . \Carbon\Carbon::parse($tgl_deadline)
            ->format('d-') . $bulan . \Carbon\Carbon::parse($tgl_deadline)
            ->format('-Y');
    }
}
