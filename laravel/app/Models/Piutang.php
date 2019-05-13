<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    protected $guarded = [];

    public function OrderKerja()
    {
        return $this->belongsTo(OrderKerja::class);
    }
}
