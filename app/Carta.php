<?php

namespace App;

use App\Plato;
use App\Familia;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $fillable = [
        'nombre','orden','carta_id'
    ];

    public function familias()
    {
        return $this->hasMany(Familia::class);


        
    }
  
}
