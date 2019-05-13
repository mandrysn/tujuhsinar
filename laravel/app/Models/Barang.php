<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
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

    public function scopeTipeProduk($query, $string)
    {
        if ($string == '1') {
            return $query->where('produk_id', 1);

        } else if ($string == '2') {
            return $query->where('produk_id', 2);

        } else if ($string == '3') {
            return $query->where('produk_id', 3);

        } else if ($string == '4') {
            return $query->where('produk_id', 4);

        } else if ($string == '5') {
            return $query->where('produk_id', 5);

        }
        
    }
    public function Supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }
    public function HargaOutdoor()
    {
        return $this->hasMany('HargaOutdoor');
    }
    public function TmpBeli()
    {
    	return $this->hasMany('TmpBeli');
    }
    public function HargaIndoor()
    {
    	return $this->hasMany('HargaIndoor');
    }
    public function HargaMerchant()
    {
    	return $this->hasMany('HargaMerchant');
    }
    public function HargaPrint()
    {
    	return $this->hasMany('HargaPrint');
    }
    public function HargaLarge()
    {
    	return $this->hasMany('HargaLarge');
    }
    public function OrderKerjaSub()
    {
    	return $this->hasMany('OrderKerjaSub');
    }
}
