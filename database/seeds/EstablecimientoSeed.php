<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablecimientoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('establecimientos')->insert([
            'nombre_comercial' => 'La FInca',
            'nombre_fiscal' => 'Vile',
            'nif' => 'B242424',
            'direccion' => 'La FInca direccion',
            'codigo_postal' => '24000',
            'poblacion' => 'La FInca poblacion',
            'provincia' => 'La FInca provincia',
            'telefono' => '987987987',

            'movil' => '69999999',
            'email' => 'LafInca@vile.com',
            'web' => 'www.LaFInca.com',
            'contacto' => 'La FInca',

            'observaciones' => 'La FInca observaciones',
            //'activa' => 'La FInca',
            'user_id' => '1',
            
            
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
