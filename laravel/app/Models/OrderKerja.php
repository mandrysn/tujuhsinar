<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderKerja extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];

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