<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UniformesColaborador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniformes_colaborador', function (Blueprint $table) {
            $table->id();

            $table->string('colaborador_no_colaborador', 6);
            $table->foreign('colaborador_no_colaborador')
                ->references('no_colaborador')->on('colaborador')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('uniformes_paquete_id')
                ->constrained('uniformes_paquete')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('uniformes_prenda_id')
                ->constrained('uniformes_prenda')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('uniformes_talla_id')
                ->constrained('uniformes_talla')
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
        Schema::dropIfExists('uniformes_colaborador');
    }
}
