<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Externo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_1', 24);
            $table->string('nombre_2', 24)->nullable();
            $table->string('ap_paterno', 24);
            $table->string('ap_materno', 24);
            $table->date('fecha_nacimiento');

            $table->foreignId('genero_id')
                ->constrained('genero')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('curp', 18);
            $table->string('rfc', 15)->unique();

            $table->foreignId('area_id')
                ->constrained('area')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('supervisor', 6);
            $table->foreign('supervisor')
                ->references('no_colaborador')->on('colaborador')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('tipo_externo_id')
                ->constrained('tipo_externo')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('tel_contacto', 10);

            $table->string('foto', 255);

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
        Schema::dropIfExists('externo');
    }
}
