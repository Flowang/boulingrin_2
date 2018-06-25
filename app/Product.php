<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id_prod','nom', 'prix_unite','img','description'];

        public function Categorie() 
    {
        return $this->belongsTo('App\Categorie');
    }
}
