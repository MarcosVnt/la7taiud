<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PublicidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('publicidads')->insert([
            'descripcion' => 'Imagen 180 x 200',
            'establecimiento_tipo_id' => 1,
            'seccion_id' => 1,
            'tamano_id' => 1,
            'user_id' => 1,
            'fecha_hasta' => Carbon::now(),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
       
    }
}

