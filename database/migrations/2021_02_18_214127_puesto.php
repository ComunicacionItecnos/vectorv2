<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Puesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('puesto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('nivel_id')
                ->constrained('nivel')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('rango_puesto_id')
                ->constrained('rango_puesto')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('especialidad_puesto', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puesto');
    }
}
