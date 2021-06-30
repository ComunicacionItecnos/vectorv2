<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualizarColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualizar_colaboradors', function (Blueprint $table) {
            $table->id();
            $table->string('colaborador_no_colaborador', 6);
            $table->foreign('colaborador_no_colaborador')
                    ->references('no_colaborador')->on('colaborador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('direccion',128);
            $table->string('colonia',100);
            $table->string('municipio',45);
            $table->string('estado',45);
            $table->string('codigo_postal',8);
            $table->foreignId('genero_id')
                    ->constrained('genero')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignId('estado_civil_id')
                    ->constrained('estado_civil')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->boolean('paternidad_id');
            $table->string('rutaActas',null);
            $table->string('rutacomprobante',null);
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
        Schema::dropIfExists('actualizar_colaboradors');
    }
}
