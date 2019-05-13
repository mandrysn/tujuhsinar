<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function Member()
    {
    	return $this->belongsTo(Member::class);
    }
    public function OrderKerja()
    {
        return $this->hasMany(OrderKerja::class);
    }
}
