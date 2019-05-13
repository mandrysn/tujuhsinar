<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function Barang()
    {
    	return $this->hasMant('Barang');
    }
}
