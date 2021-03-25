<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TamanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tamanos')->insert([
            'nombre' => '180x20',
           
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
