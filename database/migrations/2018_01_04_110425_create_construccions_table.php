<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstruccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contribuyente_id')->unsigned();
            $table->string('direccion_construccion');
            $table->double('presupuesto',8,2);
            $table->bigInteger('impuesto_id')->unsigned();
            $table->foreign('contribuyente_id')->references('id')->on('contribuyentes');
            $table->foreign('impuesto_id')->references('id')->on('impuestos');
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
        Schema::dropIfExists('construccions');
    }
}
