<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UniformesTalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniformes_talla', function (Blueprint $table) {
            $table->id();

            $table->foreignId('uniformes_prenda_id') 
                ->constrained('uniformes_prenda')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('talla', 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uniformes_talla');
    }
}
