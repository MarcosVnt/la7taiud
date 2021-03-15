<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    //

    protected $fillable = [
        'descripcion','imagen','establecimiento_tipo_id','tamano_id','seccion_id'
    ];
}
