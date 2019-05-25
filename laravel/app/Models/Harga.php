<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Harga extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public static $outdoor = '1';
    public static $indoor = '2';
    public static $merchant = '3';
    public static $print_a3 = '4';
    public static $costum = '5';

    public function getNamaProdukAttribute()
    {
        $label = [
            Barang::$outdoor => 'Outdoor',
            Barang::$indoor => 'Indoor',
            Barang::$merchant => 'Merchandise',
            Barang::$print_a3 => 'Print A3',
            Barang::$costum => 'Costum',
        ];
        return $label[$this->produk_id];
    }

    public function Member()
    {
    	return $this->belongsTo(Member::class);
    }
    public function HargaOutdoor()
    {
    	return $this->hasMany('HargaOutdoor');
    }
    public function HargaIndoor()
    {
    	return $this->hasMany('HargaIndoor');
    }
    public function HargaPrint()
    {
    	return $this->hasMany('HargaPrint');
    }
    public function HargaMerchant()
    {
    	return $this->hasMany('HargaMerchant');
    }
    public function HargaCostum()
    {
    	return $this->hasMany('HargaCostum');
    }
}