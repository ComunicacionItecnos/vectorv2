<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstacionamientoExterno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamiento_externo', function (Blueprint $table) {
            $table->id();

            $table->foreignId('externo_id')
            ->constrained('externo')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('vehiculo_externo_id')
            ->constrained('vehiculo_externo')
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
        Schema::dropIfExists('estacionamiento_externo');
    }
}
