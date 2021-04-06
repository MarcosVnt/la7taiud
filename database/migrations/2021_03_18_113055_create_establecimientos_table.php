<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_comercial')->nullable();
            $table->string('nombre_fiscal')->nullable();
            $table->string('cif')->nullable();

            $table->string('direccion')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('telefono')->nullable();
            $table->string('movil')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('contacto')->nullable();

            $table->string('observaciones')->nullable();
            $table->boolean('activa')->default(true);

            $table->string('imagen')->nullable();


            $table->foreignId('user_id')->constrained()->onDelete('cascade');


      
            $table->timestamps();
        });

        //cartas de un establecimiento
        Schema::create('cartas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->integer('orden')->nullable();
            
            $table->foreignId('establecimiento_id')->constrained()->onDelete('cascade');

            
            $table->timestamps();
        });

        // familias de una carta
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->integer('orden')->nullable();
            
            $table->foreignId('carta_id')->constrained()->onDelete('cascade');

            
            $table->timestamps();
        });

        // platos del establecimiento

        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('observaciones')->nullable();

            $table->integer('orden')->nullable();
            $table->double('precio', 10, 2)->nullable();

            $table->string('moneda')->nullable();
            
            $table->foreignId('establecimiento_id')->constrained()->onDelete('cascade');

            
            $table->timestamps();
        });

        // platos que hay por cada familia de una carta de un establacimiento 
        Schema::create('familia_plato', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('familia_id')->constrained()->onDelete('cascade');
            $table->foreignId('plato_id')->constrained()->onDelete('cascade');
            $table->integer('orden')->nullable();

           // $table->timestamps();
        });


        Schema::create('alergenos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('observaciones')->nullable();

            $table->integer('orden')->nullable();
            $table->boolean('activa')->default(true);

            
            
            $table->timestamps();
        });

         // platos que hay por cada familia de una carta de un establacimiento 
         Schema::create('plato_alergeno', function (Blueprint $table) {
           // $table->id();
            $table->foreignId('alergeno_id')->constrained()->onDelete('cascade');
            $table->foreignId('plato_id')->constrained()->onDelete('cascade');
            $table->integer('orden')->nullable();

           // $table->timestamps();
        });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimientos');
    }
}
