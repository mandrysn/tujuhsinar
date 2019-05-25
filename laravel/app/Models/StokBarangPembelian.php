<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBarangPembelian extends Model
{
    protected $guarded = [];

    public function Pembelian()
    {
    	return $this->belongsTo(Pembelian::class);
    }
}
