<?php

namespace App;

use App\Carta;
use App\Plato;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    
    protected $fillable = [
        'nombre','orden','carta_id'
    ];

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }
    public function platos()
    {
        return $this->belongsToMany(Plato::class);
    }


  

}
