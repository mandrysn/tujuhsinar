<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function getTugasAttribute(){
        $role = $this->role;
        if ($role == 1) return 'Admin';
        elseif($role == 2) return 'Order';
        elseif($role == 3) return 'Kasir';
        elseif($role == 5) return 'Owner';
        elseif($role == 6) return 'Outdoor';
        elseif($role == 7) return 'Indoor';
        elseif($role == 8) return 'Merchandise';
        elseif($role == 9) return 'Print A3';
        elseif($role == 10) return 'Costum';
        else return '*Undefined';
    }

}
