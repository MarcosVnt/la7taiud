<?php

namespace App;

use App\User;
use App\Carta;
use App\Familia;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    //

    protected $fillable = [
        'nombre_comercial','nombre_fiscal','nif','direccion','codigo_postal','poblacion','provincia',
        'telefono','movil','email','web','contacto','observaciones','activa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function carta()
    {
        return $this->hasMany(Carta::class);
    }

    // familias que tiene una establecimiento a traves de las cartas...

    public function familias()
    {
        return $this->hasOneThrough(Familia::class, Carta::class);
    }
    
    
    
    
   
}
