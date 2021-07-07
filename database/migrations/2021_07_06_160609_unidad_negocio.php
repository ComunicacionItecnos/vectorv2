<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnidadNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_negocio', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_unidad',24);

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
        Schema::dropIfExists('unidad_negocio');
    }
}
