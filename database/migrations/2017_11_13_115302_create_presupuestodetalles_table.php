<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestodetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestodetalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('presupuesto_id')->unsigned();
            $table->string('material');
            $table->integer('cantidad');
            $table->double('preciou',8,2);
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestodetalles');
    }
}
