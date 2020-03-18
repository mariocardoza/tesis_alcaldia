<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_proyectos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('proyecto_id')->unsigned();
          $table->string('motivo_contratacion')->nullable();
          $table->date('inicio_contrato');
          $table->date('fin_contrato');
          $table->time('hora_entrada');
          $table->time('hora_salida');
          $table->string('motivo_baja')->nullable();
          $table->integer('estado')->default(1);
          $table->foreign('proyecto_id')->references('id')->on('proyectos');
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
        Schema::dropIfExists('contrato_proyectos');
    }
}
