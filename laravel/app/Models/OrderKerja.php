<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class OrderKerja extends Model
{
    protected $guarded = [];
=======
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderKerja extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174

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