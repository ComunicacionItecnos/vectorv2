<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UniformesPaquetePrenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniformes_paquete_prenda', function (Blueprint $table) {
            $table->id();

            $table->foreignId('uniformes_paquete_id')
                ->constrained('uniformes_paquete')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('uniformes_prenda_id')
                ->constrained('uniformes_prenda')
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
        Schema::dropIfExists('uniformes_paquete_prenda');
    }
}
