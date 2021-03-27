<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaPlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        
        public function run()
        {
            //primer plato
            DB::table('familia_plato')->insert([
    
    
                'familia_id' => 1,
                'plato_id' => 1,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 1,
                'plato_id' => 2,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


            // segundo plato
    
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 2,
                'plato_id' => 3,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 2,
                'plato_id' => 4,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 2,
                'plato_id' => 5,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
    



            // postres
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 3,
                'plato_id' => 6,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 3,
                'plato_id' => 7,
                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
    
    
    // carta dos


    }
}
