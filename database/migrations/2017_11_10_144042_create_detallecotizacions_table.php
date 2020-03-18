<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallecotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecotizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cotizacion_id')->unsigned();
            $table->string('unidad_medida');
            $table->integer('cantidad');
            $table->double('precio_unitario');
            $table->foreign('cotizacion_id')->references('id')->on('cotizacions');
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
        Schema::dropIfExists('detallecotizacions');
    }
}
