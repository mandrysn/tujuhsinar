<?php

namespace App\Models;

use App\Models\Harga;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    public function Pelanggan()
    {
    	return $this->hasMany('Pelanggan');
    }
    public function Harga()
    {
    	return $this->hasMany('Harga');
    }
    public function Kaki()
    {
    	return $this->hasMany('Kaki');
    }
    public function Editor()
    {
    	return $this->hasMany('Editor');
    }
}