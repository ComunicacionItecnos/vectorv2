<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            
            $table->id();
            $table->string('placa', 16);
            $table->string('tipo_vehiculo');
            $table->string('marca', 32);
            $table->string('modelo', 32);
            $table->integer('fecha_modelo');
            $table->string('color', 32);

            $table->string('colaborador_no_colaborador', 6);
            $table->foreign('colaborador_no_colaborador')
                ->references('no_colaborador')->on('colaborador')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
}
