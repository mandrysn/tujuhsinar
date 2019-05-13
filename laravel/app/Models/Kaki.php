<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaki extends Model
{
    protected $guarded = [];

    public static $outdoor = '1';
    public static $indoor = '2';
    public static $merchant = '3';
    public static $print_a3 = '4';
    public static $costum = '5';

    public function getTipeProdukAttribute()
    {
        $label = [
            Barang::$outdoor => 'Outdoor',
            Barang::$indoor => 'Indoor',
            Barang::$merchant => 'Merchant',
            Barang::$print_a3 => 'Print A3',
            Barang::$costum => 'Costum',
        ];
        return $label[$this->produk_id];
    }
}
