<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosEmergenciaNuevosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos_emergencia_nuevos', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('id_nuevoIngreso');
            $table->foreign('id_nuevoIngreso')->references('id')->on('nuevo_ingresos');

            $table->string('nombre',60);
            $table->string('parentesco',45);
            $table->string('telefono',10);
            $table->string('domicilio',255);

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
        Schema::dropIfExists('contactos_emergencia_nuevos');
    }
}
