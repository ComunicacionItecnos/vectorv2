<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColaboradorInsignia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'colaborador_insignia',
            function (Blueprint $table) {

                $table->id();

                $table->string('colaborador_no_colaborador', 6);
                $table->foreign('colaborador_no_colaborador')
                    ->references('no_colaborador')->on('colaborador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->foreignId('insignia_id')
                    ->constrained('insignia')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->foreignId('valores_business_id')
                    ->constrained('valores_business')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->date('fecha_asignacion');

                $table->string('colaborador_asignador',6);
                $table->foreign('colaborador_asignador')
                    ->references('no_colaborador')->on('colaborador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                $table->string('mensaje', 512)->nullable();
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
        Schema::dropIfExists('colaborador_insignia');
    }
}
