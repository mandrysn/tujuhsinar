<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Supplier extends Model
{
    protected $guarded = [];
=======
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174

    public function Barang()
    {
    	return $this->hasMant('Barang');
    }
}
