<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Marbete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marbete', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tipo_vehiculo_id')
                ->constrained('tipo_vehiculo')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('numero', 4);
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marbete');
    }
}
