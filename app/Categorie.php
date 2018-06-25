<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{


    public function product() 
    {
        return $this->hasMany('App\Product');
    }
    
    protected $fillable = ['id_cat','libelle'];
}
