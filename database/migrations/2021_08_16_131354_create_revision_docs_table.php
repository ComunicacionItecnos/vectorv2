<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_docs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("nuevo_ingreso_id");
            $table->integer("areaRd")->default(5)->comment(('5=reclu 3=admin')); 
            $table->string("R_obscredencial")->nullable();
            $table->string("R_obsfecNac" )->nullable();
            $table->string("R_obscurp")->nullable();
            $table->string("R_obsrfc" )->nullable();
            $table->string("R_obsimss" )->nullable();
            $table->string("R_obsdomicilio")->nullable();
            $table->string("R_obsNivelEstudios" )->nullable();
            $table->string("R_obsExtra")->nullable();
            $table->string("A_obscredencial" )->nullable();
            $table->string("A_obsfecNac" )->nullable();
            $table->string("A_obscurp" )->nullable();
            $table->string("A_obsrfc" )->nullable();
            $table->string("A_obsimss" )->nullable();
            $table->string("A_obsdomicilio" )->nullable();
            $table->string("A_obsNivelEstudios" )->nullable();
            $table->string("A_obsExtra" )->nullable();
            $table->integer("status")->default(0)->comment("0=no revivasado, 1=incompleto, 2=completado, 3=rechazado");
            
            $table->unsignedBigInteger("R_userId")->nullable();
            $table->foreign('R_userId')->references('id')->on('users'); 

            $table->unsignedBigInteger("A_userId")->nullable();
            $table->foreign('A_userId')->references('id')->on('users'); 

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
        Schema::dropIfExists('revision_docs');
    }
}
