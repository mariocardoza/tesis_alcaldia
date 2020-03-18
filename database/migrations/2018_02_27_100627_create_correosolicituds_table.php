<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorreosolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correosolicituds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('solicitudcotizacion_id')->unsigned();
            $table->string('correo');
            $table->foreign('solicitudcotizacion_id')->references('id')->on('solicitudcotizacions');
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
        Schema::dropIfExists('correosolicituds');
    }
}
