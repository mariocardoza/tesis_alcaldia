<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestounidaddetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestounidaddetalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('presupuestounidad_id')->unsigned();
            $table->string('descripcion');
            $table->string('unidad_medida');
            $table->integer('cantidad');
            $table->double('precio',8,2);
            $table->foreign('presupuestounidad_id')->references('id')->on('presupuestounidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestounidaddetalles');
    }
}
