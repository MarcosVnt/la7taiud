<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role_name' => 'Administrador',
            'role_slug' => 'Administrador',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Establecimiento',
            'role_slug' => 'Establecimiento',
        ]);
    }
}
