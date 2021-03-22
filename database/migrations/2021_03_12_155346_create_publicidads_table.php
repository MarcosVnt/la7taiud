<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       
        Schema::create('seccions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('tamanos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('establecimiento_tipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('publicidads', function (Blueprint $table) {
            $table->id();

                $table->string('descripcion')->nullable();
                $table->string('imagen')->nullable();
                $table->date('fecha_hasta')->nullable();
                $table->boolean('activa')->default(true);
                $table->foreignId('seccion_id')->constrained()->onDelete('cascade');
                $table->foreignId('tamano_id')->constrained()->onDelete('cascade');
                $table->foreignId('establecimiento_tipo_id')->constrained()->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');

              

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicidads');
    }
}
