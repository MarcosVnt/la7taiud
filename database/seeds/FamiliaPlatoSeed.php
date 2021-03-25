<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaPlatoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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

            
            'familia_id' => 3,
            'plato_id' => 4,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



// carta dos
        DB::table('familia_plato')->insert([


            'familia_id' => 4,
            'plato_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('familia_plato')->insert([

            
            'familia_id' => 4,
            'plato_id' => 2,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('familia_plato')->insert([

            
            'familia_id' => 5,
            'plato_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('familia_plato')->insert([

            
            'familia_id' => 5,
            'plato_id' => 2,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('familia_plato')->insert([

            
            'familia_id' => 6,
            'plato_id' => 3,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // familia 4

        DB::table('familia_plato')->insert([


            'familia_id' => 7,
            'plato_id' => 1,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('familia_plato')->insert([

            
            'familia_id' => 7,
            'plato_id' => 2,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('familia_plato')->insert([

            
            'familia_id' => 7,
            'plato_id' => 3,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('familia_plato')->insert([

            
            'familia_id' => 8,
            'plato_id' => 4,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('familia_plato')->insert([

            
            'familia_id' => 9,
            'plato_id' => 4,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);





    }
}
