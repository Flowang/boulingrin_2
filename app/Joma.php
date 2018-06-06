<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joma extends Model
{
        protected $fillable = ['id','joma'];

public function users() 
    {
        return $this->belongsToMany('App\User','joma_users','id_users','id_joma');
    }

}
