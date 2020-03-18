<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoToCategoriatrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria_trabajos', function (Blueprint $table) {
            $table->bigInteger('estado')->unsigned()->default(1);
            $table->date('fecha_baja')->nullable();
            $table->string('motivo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria_trabajos', function (Blueprint $table) {
            $table->dropColumn('estado');
            $table->dropColumn('fecha_baja');
            $table->dropColumn('motivo');
        });
    }
}
