<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranBahan extends Model
{
    protected $guarded = [];
    
    public static $outdoor = '1';
    public static $indoor      = '2';
    public static $merchant    = '3';
    public static $print      = '4';
    public static $costum     = '5';

    public function getNamaProdukAttribute()
    {
        $label = [
            UkuranBahan::$outdoor  => 'Outdoor',
            UkuranBahan::$indoor  => 'Indoor',
            UkuranBahan::$merchant  => 'Merchandise',
            UkuranBahan::$print  => 'Print A3',
            UkuranBahan::$costum  => 'Costum'
        ];
        return $label[$this->produk_id];
    }

    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function Detail()
    {
        return $this->hasMany(DetailUkuranBahan::class);
    }
}