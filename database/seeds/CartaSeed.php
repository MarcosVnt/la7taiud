<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cartas')->insert([
            'nombre' => 'Menu del Día',
            'orden' => '1',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cartas')->insert([
            'nombre' => 'Menu de NObche',
            'orden' => '2',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cartas')->insert([
            'nombre' => 'Postres',
            'orden' => '3',
            'establecimiento_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
