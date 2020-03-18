<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->date('inicio_contrato');
            $table->date('fin_contrato');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->date('fecha_aprobacion');
            $table->date('fecha_revision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropColumn('inicio_contrato');
            $table->dropColumn('fin_contrato');
            $table->dropColumn('hora_entrada');
            $table->dropColumn('hora_salida');
            $table->dropColumn('fecha_aprobacion');
            $table->dropColumn('fecha_revision');
        });
    }
}
