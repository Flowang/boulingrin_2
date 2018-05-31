<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','roles_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() 
    {
        return $this->hasMany('App\Role');
    }

}
