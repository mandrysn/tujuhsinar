<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function getTugasAttribute(){
        $role = $this->role;
        if ($role == 1) return 'Admin';
        elseif($role == 2) return 'Owner';
        elseif($role == 3) return 'Produksi';
        elseif($role == 4) return 'Kasir';
        elseif($role == 5) return 'Setting';
        else return '*Undefined';
    }

}
