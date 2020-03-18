k<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoSuministrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_suministros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proveedor_id')->unsigned();
            $table->bigInteger('requisicion_id')->unsigned();
            $table->date('fecha_contratacion');
            $table->date('inicio_contrato');
            $table->date('fecha_revision')->nullable();
            $table->string('motivo_baja')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->integer('estado')->default(1);
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
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
        Schema::dropIfExists('contrato_suministros');
    }
}
