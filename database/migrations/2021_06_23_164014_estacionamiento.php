<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estacionamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamiento', function (Blueprint $table) {
            $table->id();

            $table->string('colaborador_no_colaborador', 6);
            $table->foreign('colaborador_no_colaborador')
                ->references('no_colaborador')->on('colaborador')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('vehiculo_id')
                ->constrained('vehiculo')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('marbete_id')
                ->constrained('marbete')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('estacionamiento');
    }
}
