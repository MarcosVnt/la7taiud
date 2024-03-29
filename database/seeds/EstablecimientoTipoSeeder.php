<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablecimientoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('establecimiento_tipos')->insert([
            'nombre' => 'Bar',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('establecimiento_tipos')->insert([
            'nombre' => 'Restaurante',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('establecimiento_tipos')->insert([
            'nombre' => 'Bar/restaurante',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('establecimiento_tipos')->insert([
            'nombre' => 'Hotel',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('establecimiento_tipos')->insert([
            'nombre' => 'Otros',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
