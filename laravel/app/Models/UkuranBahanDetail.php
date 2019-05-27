<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranBahanDetail extends Model
{
    protected $guarded = [];

    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
