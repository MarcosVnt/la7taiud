<?php

use CartaSeed;
use PlatoSeed;
use RoleSeeder;
use TamanoSeed;
use FamiliaSeed;
use SalarioSeed;
use SeccionSeed;
use UsuarioSeed;
use CategoriaSeed;
use UbicacionSeed;
use PublicidadSeed;
use ExperienciaSeed;
use FamiliaPlatoSeed;
use EstablecimientoSeed;
use EstablecimientoTipoSeed;
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
        $this->call(RoleSeeder::class);
        
        $this->call(UsuarioSeed::class);
        
    //    $this->call(CategoriaSeed::class);
    //    $this->call(ExperienciaSeed::class);    
    //    $this->call(UbicacionSeed::class);    
    //    $this->call(SalarioSeed::class);  

        $this->call(SeccionSeed::class);    
        $this->call(TamanoSeed::class);    

    
       $this->call(EstablecimientoTipoSeed::class);    
       $this->call(PublicidadSeed::class);    
       $this->call(EstablecimientoSeed::class);   
       $this->call(CartaSeed::class);   
        
       $this->call(FamiliaSeed::class);   
       $this->call(PlatoSeed::class);   
       $this->call(FamiliaPlatoSeed::class);   


    }
}
