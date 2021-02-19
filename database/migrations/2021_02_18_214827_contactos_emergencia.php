<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactosEmergencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos_emergencia', function (Blueprint $table){
            $table->id();

            $table->string('colaborador_no_colaborador');
            $table->foreign('colaborador_no_colaborador',6)
                    ->references('no_colaborador')->on('colaborador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('nombre',60);
            $table->string('parentesco',45);
            $table->string('telefono',10);
            $table->string('domicilio',255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
