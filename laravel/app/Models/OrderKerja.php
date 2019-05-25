<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderKerja extends Model
{
    protected $guarded = [];

    public function OrderKerjaSub()
    {
    	return $this->hasMany(OrderKerjaSub::class, 'order_kerja_id', 'id');
    }
    public function Piutang()
    {
        return $this->hasOne(Piutang::class);
    }
    public function Pelanggan()
    {
    	return $this->belongsTo(Pelanggan::class);
    }
    public function getJumharAttribute(){
        $jum = 0;
        foreach ($this->orderkerjasub as $i) {
            $jum += $i->harga * $i->qty;
        }
        return $jum;
    }
}