<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaCostum extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'harga_costums';
    protected $dates = ['deleted_at'];

    public function Harga()
    {
    	return $this->belongsTo(Harga::class);
    }
}