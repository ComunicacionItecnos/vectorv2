<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColaboradorEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_evento', function (Blueprint $table){
            $table->string('colaborador_no_colaborador', 6);
            $table->foreign('colaborador_no_colaborador')
                    ->references('no_colaborador')->on('colaborador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            
            $table->foreignId('eventos_especiales_id')
                    ->constrained('eventos_especiales')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->boolean('entrega');
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
