<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    protected $guarded = [];

    public function StokBarangPembelian()
    {
    	return $this->belongsTo(StokBarangPembelian::class);
    }
}
