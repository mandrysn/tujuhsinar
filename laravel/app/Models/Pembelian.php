<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $protected = [];

    public function Supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }
    public function Barang()
    {
    	return $this->belongsTo(Barang::class);
    }
}
