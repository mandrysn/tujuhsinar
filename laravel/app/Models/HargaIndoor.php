<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaIndoor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Harga()
    {
    	return $this->belongsTo(Harga::class);
    }
    public function Barang()
    {
    	return $this->belongsTo(Barang::class);
    }
}
