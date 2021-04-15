<?php

use Illuminate\Database\Seeder;

class AlergenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alergenos')->insert([
            'nombre' => 'Gluten',
            'imagen' => 'Alergenos/Gluten.png',
        

        ]);
       
        DB::table('alergenos')->insert([
            'nombre' => 'Altramuces',
            'imagen' => 'Alergenos/Altramuces.png',
        

        ]);
        DB::table('alergenos')->insert([
            'nombre' => 'Apio',
            'imagen' => 'Alergenos/Apio.png',
        

        ]);
        DB::table('alergenos')->insert([
            'nombre' => 'Cacahuetes',
            'imagen' => 'Alergenos/Cacahuetes.png',
        

        ]);
        DB::table('alergenos')->insert([
            'nombre' => 'Dióxido de Azufre',
            'imagen' => 'Alergenos/Dixido-de-Azufre.png',
        

        ]);

        DB::table('alergenos')->insert([
            'nombre' => 'Frutos de Cascara',
            'imagen' => 'Alergenos/Frutos-de-Cascara.png',
        

        ]);
        DB::table('alergenos')->insert([
            'nombre' => 'Granos de Sésamo',
            'imagen' => 'Alergenos/Granos-de-sesamo.png',
        

        ]);
        DB::table('alergenos')->insert([
            'nombre' => 'Huevos',
            'imagen' => 'Alergenos/Huevos.png',
        

        ]); 
        
        DB::table('alergenos')->insert([
            'nombre' => 'Lácteos',
            'imagen' => 'Alergenos/Lacteos.png',
        

        ]); 
        
        DB::table('alergenos')->insert([
            'nombre' => 'Moluscos',
            'imagen' => 'Alergenos/Moluscos.png',
        

        ]); 
        
        DB::table('alergenos')->insert([
            'nombre' => 'Mostaza',
            'imagen' => 'Alergenos/Mostaza.png',
        

        ]);
        
        DB::table('alergenos')->insert([
            'nombre' => 'Pescado',
            'imagen' => 'Alergenos/Pescado.png',
        

        ]); 
        
        DB::table('alergenos')->insert([
            'nombre' => 'Soja',
            'imagen' => 'Alergenos/Soja.png',
        

        ]); 
    }
    }
}
