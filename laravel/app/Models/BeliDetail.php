<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeliDetail extends Model
{
	protected $guarded = [];

	public function Beli()
    {
    	return $this->belongsTo(Beli::class);
    }

    public function Supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }

    public function Barang()
    {
    	return $this->belongsTo(Barang::class);
    }
}
