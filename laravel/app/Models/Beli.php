<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $guarded = [];

    public function belidetail()
    {
    	return $this->hasMany('BeliDetail');
    }
}
