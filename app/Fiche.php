<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
        use Notifiable;

    public function saveFiche($data)
{    
        $this->user_id = auth()->user()->id;
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->save();
        return 1;
}
    protected $fillable = ['id','user_id','title','description','img'];
}
