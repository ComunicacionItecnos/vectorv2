<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnidadNegocioGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_negocio_grupo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_grupo', 2);

            $table->foreignId('unidad_negocio_familia_id')
            ->constrained('unidad_negocio_familia')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('supervisor_id', 6);
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
        Schema::dropIfExists('unidad_negocio_grupo');
    }
}
