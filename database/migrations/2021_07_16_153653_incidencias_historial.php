<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IncidenciasHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'incidencias_historial',
            function (Blueprint $table) {

                $table->id();

                $table->string('colaborador_no_colaborador', 6);
                $table->foreign('colaborador_no_colaborador')
                ->references('no_colaborador')->on('colaborador')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreignId('tipo_incidencia_id')
                ->constrained('tipo_incidencia')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->dateTime('fecha_incidencia');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias_historial');
    }
}
