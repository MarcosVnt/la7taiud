<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatoSeeder extends Seeder
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
            'nombre' => 'Filete ternera',
            'observaciones'=>'nombre del plato con observaciones',

            'orden' => '3',
            'establecimiento_id' => 1,
            'precio' => '12.50',
            'moneda' => '$',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Lubina del cantabrico',
            'observaciones'=>'nombre del plato con observaciones',
            'moneda' => '€',

            'orden' => '4',
            'establecimiento_id' => 1,
            'precio' => '12.50',

            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('platos')->insert([
            'nombre' => 'Lechazo al horno',
            'observaciones'=>'nombre del plato con observaciones',
            'moneda' => '€',

            'orden' => '5',
            'establecimiento_id' => 1,
            'precio' => '12.50',

            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('platos')->insert([
            'nombre' => 'tarta de limon',
            'observaciones'=>'nombre del plato con observaciones',
            'moneda' => '€',

            'orden' => '6',
            'establecimiento_id' => 1,
            'precio' => '12.50',

            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Tarta de queso',
            'observaciones'=>'nombre del plato con observaciones',
            'moneda' => '€',

            'orden' => '7',
            'establecimiento_id' => 1,
            'precio' => '12.50',

            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
