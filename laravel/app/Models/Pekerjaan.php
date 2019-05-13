<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $guarded = [];

    public function HargaSub()
    {
    	return $this->hasMany('HargaSub');
    }
    public function Printer()
    {
    	return $this->belongsTo(Printer::class);
    }
}
