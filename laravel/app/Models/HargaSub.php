<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaSub extends Model
{
    protected $guarded = [];

    public function Harga()
    {
    	return $this->belongsTo(Harga::class);
    }
    public function Pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }
    public function getNmPekerjaanAttribute($nm_pekerjaan)
    {
        if ($this->pekerjaan) {
            return $this->pekerjaan->nm_pekerjaan;
        }
    }
}
