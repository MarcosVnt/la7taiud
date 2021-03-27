<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        {
            //
            DB::table('familias')->insert([
                'nombre' => 'Primer plato',
                'orden' => '1',
                'carta_id' => '1',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familias')->insert([
                'nombre' => 'Segundo plato',
                'orden' => '2',
                'carta_id' => '1',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familias')->insert([
                'nombre' => 'Postre plato',
                'orden' => '3',
                'carta_id' => '1',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
    
    
            DB::table('familias')->insert([
                'nombre' => 'Entrantes',
                'orden' => '1',
                'carta_id' => '2',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familias')->insert([
                'nombre' => 'Segundos',
                'orden' => '2',
                'carta_id' =>'2',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familias')->insert([
                'nombre' => 'Postres',
                'orden' => '3',
                'carta_id' => '2',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            DB::table('familias')->insert([
                'nombre' => 'Ensaldas',
                'orden' => '1',
                'carta_id' => '3',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familias')->insert([
                'nombre' => 'Segundos platos',
                'orden' => '2',
                'carta_id' => '3',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familias')->insert([
                'nombre' => 'Postre de noche',
                'orden' => '3',
                'carta_id' => '3',
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
