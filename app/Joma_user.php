<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joma_user extends Model
{
    use Notifiable;
    
    protected $fillable = ['id','id_joma','id_users'];
}
