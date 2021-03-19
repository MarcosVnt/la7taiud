<?php

namespace App;

use App\Tamano;
use App\Seccion;
use App\EstablecimientoTipo;
use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    //

    protected $fillable = [
        'descripcion','imagen','establecimiento_tipo_id','tamano_id','seccion_id','fecha_hasta','activa'
    ];

    public function establecimientoTipo()
    {
        return $this->belongsTo(EstablecimientoTipo::class);
    }
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
    public function tamano()
    {
        return $this->belongsTo(Tamano::class);
    }


}
