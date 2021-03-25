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
        $this->call(RoleSeeder::class);
        
        $this->call(UsuarioSeeder::class);
        
    //    $this->call(CategoriaSeeder::class);
    //    $this->call(ExperienciaSeeder::class);    
    //    $this->call(UbicacionSeeder::class);    
    //    $this->call(SalarioSeeder::class);  

        $this->call(SeccionSeeder::class);    
        $this->call(TamanoSeeder::class);    

    
       $this->call(EstablecimientoTipoSeeder::class);    
       $this->call(EstablecimientoSeeder::class);   
       $this->call(CartaSeeder::class);   
        
       $this->call(FamiliaSeeder::class);   
       $this->call(PlatoSeeder::class);   
       $this->call(FamiliaPlatoSeeder::class);   
       $this->call(PublicidadSeeder::class);    



    }
}
