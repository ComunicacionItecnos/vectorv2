<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehiculoExterno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo_externo', function (Blueprint $table) {

            $table->id();
            $table->string('placa', 16);

            $table->foreignId('tipo_vehiculo_id')
            ->constrained('tipo_vehiculo')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('marca', 32);
            $table->string('modelo', 32);
            $table->integer('fecha_modelo');
            $table->string('color', 32);

            $table->foreignId('externo_id')
            ->constrained('externo')
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
        Schema::dropIfExists('vehiculo_externo');
    }
}
