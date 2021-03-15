<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SeccionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('seccions')->insert([
            'nombre' => 'Arriba',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('seccions')->insert([
            'nombre' => 'centro',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('seccions')->insert([
            'nombre' => 'abajo',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
       
    }
}
