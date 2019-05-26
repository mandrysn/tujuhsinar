<?php

namespace App\Models;

use App\Models\Harga;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Member extends Model
{
    protected $guarded = [];
=======
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174

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