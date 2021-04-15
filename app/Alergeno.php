<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergeno extends Model
{
    //


    protected $fillable = [
        'nombre','imagen'
    ];


    public function platos()
    {
        return $this->belongsToMany(Plato::class);
    }

}
