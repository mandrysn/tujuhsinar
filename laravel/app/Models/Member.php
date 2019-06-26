<?php

namespace App\Models;

use App\Models\Harga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function Pelanggan()
    {
    	return $this->hasMany(Pelanggan::class);
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