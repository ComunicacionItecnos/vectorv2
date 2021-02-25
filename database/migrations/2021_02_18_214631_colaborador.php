<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Colaborador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador', function (Blueprint $table){
            $table->string('no_colaborador', 6)->primary();
            $table->string('nombre', 50);
            $table->string('ap_paterno', 50);
            $table->string('ap_materno', 50);
            $table->date('fecha_nacimiento');

            $table->foreignId('genero_id')
                    ->constrained('genero')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('estado_civil_id')
                    ->constrained('estado_civil')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('domicilio',128);
            $table->string('municipio',45);
            $table->string('estado',45);
            $table->string('codigo_postal',8);
            $table->boolean('paternidad_id');

            $table->foreignId('turno_id')
                    ->constrained('turno')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('ruta_transporte_id')
                    ->constrained('ruta_transporte')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('puesto_id')
                    ->constrained('puesto')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('area_id')
                    ->constrained('area')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('correo',255);
            $table->string('tel_fijo',10);
            $table->string('tel_movil',10);
            $table->string('tel_recados',10);

            $table->foreignId('extension_id')
                    ->constrained('extension')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('clave_radio_id')
                    ->constrained('clave_radio')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('jefe_directo',6);

            $table->foreignId('tipo_colaborador_id')
                    ->constrained('tipo_colaborador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->date('fecha_ingreso');
            $table->string('password',32);
            $table->boolean('matriculacion');

            $table->foreignId('tipo_usuario_id')
                    ->constrained('tipo_usuario')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('rango_factor_id')
                    ->constrained('rango_factor')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('rims')->nullable();

            $table->boolean('autoeval_gen')->nullable();
            $table->boolean('autoeval_asig')->nullable();
            $table->integer('autoeval_cal')->nullable();

            $table->boolean('eval_gen')->nullable();
            $table->boolean('eval_asig')->nullable();
            $table->integer('eval_cal')->nullable();

            $table->boolean('estado_colaborador')->nullable();
            $table->string('foto',255);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaborador');
    }
}