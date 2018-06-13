<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
        use Notifiable;

    public function product() 
    {
        return $this->hasMany('App\Product');
    }
    
    protected $fillable = ['id','libelle'];
}
