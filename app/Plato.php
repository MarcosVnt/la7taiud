<?php

namespace App;

use App\Alergeno;
use App\Establecimiento;
use App\Familia;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    
    protected $fillable = [
        'nombre','orden','establecimiento_id'
    ];

    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class);
    }

    public function familias() //todo familias
    {
        return $this->belongsToMany(Familia::class);
    }


  public function alergenos()
    {
        return $this->belongsToMany(Alergeno::class);
    }
 


}
