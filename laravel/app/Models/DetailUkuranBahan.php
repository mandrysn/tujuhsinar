<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailUkuranBahan extends Model
{
    

    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
