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
                
              
            ]);
    
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 1,
                'plato_id' => 2,
                
                ]);


            // segundo plato
    
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 2,
                'plato_id' => 3,
                
               
            ]);
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 2,
                'plato_id' => 4,
                
               
            ]);
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 2,
                'plato_id' => 5,
                
               
            ]);
    
    



            // postres
            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 3,
                'plato_id' => 6,
                ]);  
              

            DB::table('familia_plato')->insert([
    
                
                'familia_id' => 3,
                'plato_id' => 7,
                
               
            ]);
    
    
    
    // carta dos


    }
}
