<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestounidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestounidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unidad_id')->unsigned();
            $table->double('total',8,2);
            $table->integer('estado')->default(1);
            $table->foreign('unidad_id')->references('id')->on('unidads');
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
        Schema::dropIfExists('presupuestounidads');
    }
}
