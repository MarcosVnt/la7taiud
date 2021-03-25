<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('platos')->insert([
            'nombre' => 'Lentejas a la leonesa',
            'observaciones'=>'nombre del plato con observaciones',
            'orden' => '1',
            'establecimiento_id' => 1,
            'precio' => '12.50',
            'moneda' => '€',
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Cocido Leones',
            'observaciones'=>'nombre del plato con observaciones',

            'orden' => '2',
            'establecimiento_id' => 1,
            'precio' => '12.50',
            'moneda' => '€',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Filete Leones',
            'observaciones'=>'nombre del plato con observaciones',

            'orden' => '3',
            'establecimiento_id' => 1,
            'precio' => '12.50',
            'moneda' => '$',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Lubina Leonesa',
            'observaciones'=>'nombre del plato con observaciones',
            'moneda' => '€',

            'orden' => '4',
            'establecimiento_id' => 1,
            'precio' => '12.50',

            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
