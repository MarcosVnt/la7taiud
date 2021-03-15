<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioSeed::class);
        $this->call(CategoriaSeed::class);
        $this->call(ExperienciaSeed::class);    
        $this->call(UbicacionSeed::class);    
        $this->call(SalarioSeed::class);  

        //$this->call(EstablecimientoTipoSeed::class);    
        $this->call(SeccionSeed::class);    
        $this->call(TamanoSeed::class);    

        //$this->call(PublicidadSeed::class);    



    }
}
