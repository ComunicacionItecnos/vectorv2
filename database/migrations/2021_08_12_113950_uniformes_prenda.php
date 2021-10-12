<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UniformesPrenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniformes_prenda', function (Blueprint $table) {
            $table->id();

            $table->foreignId('uniformes_proveedor_id')
                ->constrained('uniformes_proveedor')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('prenda', 50);
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
        Schema::dropIfExists('uniformes_prenda');
    }
}
