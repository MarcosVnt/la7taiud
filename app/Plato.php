<?php

namespace App;

use App\Plato;
use App\Establecimiento;
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

    public function familia()
    {
        return $this->belongsToMany(Familia::class);
    }
  


}
