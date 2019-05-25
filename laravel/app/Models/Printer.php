<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $guarded = [];

    public function HargaOutdoor()
    {
    	return $this->hasMany('HargaOutdoor');
    }
    public function HargaIndoor()
    {
    	return $this->hasMany('HargaIndoor');
    }
    public function HargaMerchant()
    {
    	return $this->hasMany('HargaMerchant');
    }
    public function HargaLarge()
    {
    	return $this->hasMany('HargaLarge');
    }
    public function HargaPrint()
    {
    	return $this->hasMany('HargaPrint');
    }
    public function OrderKerjaSub()
    {
    	return $this->hasMany('OrderKerjaSub');
    }
}
