<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnidadNegocioFamilias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_negocio_familia', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_familia', 24);

            $table->foreignId('unidad_negocio_id')
                ->constrained('unidad_negocio')
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
        Schema::dropIfExists('unidad_negocio_familia');
    }
}
