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
            'orden' => '1',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Cocido Leones',
            'orden' => '2',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Filete Leones',
            'orden' => '3',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('platos')->insert([
            'nombre' => 'Lubina Leonesa',
            'orden' => '4',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
