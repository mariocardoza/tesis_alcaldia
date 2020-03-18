<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratacionProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratacion_proyectos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('empleado_id')->unsigned();
          $table->bigInteger('contratoproyecto_id')->unsigned();
          $table->string('cargo');
          $table->double('salario',8,2);
          $table->date('fecha_contratacion');
          $table->date('fecha_revision')->nullable();
          $table->foreign('empleado_id')->references('id')->on('empleados');
          $table->foreign('contratoproyecto_id')->references('id')->on('contrato_proyectos');
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
        Schema::dropIfExists('contratacion_proyectos');
    }
}
