<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColaboradorUnidadNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_unidad_negocio', function (Blueprint $table) {
            $table->id();

            $table->string('colaborador_no_colaborador', 6);
            $table->foreign('colaborador_no_colaborador')
            ->references('no_colaborador')->on('colaborador')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('unidad_negocio_grupo_id')
            ->constrained('unidad_negocio_grupo')
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
        Schema::dropIfExists('colaborador_unidad_negocio');
    }
}
