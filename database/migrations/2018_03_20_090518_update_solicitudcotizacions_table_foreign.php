<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSolicitudcotizacionsTableForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudcotizacions', function (Blueprint $table) {
            $table->dropForeign('solicitudcotizacions_proyecto_id_foreign');
            $table->dropColumn('proyecto_id');
            $table->bigInteger('presupuesto_id')->unsigned();
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
        Schema::table('solicitudcotizacions', function (Blueprint $table) {
            $table->bigInteger('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->dropForeign('solicitudcotizacions_presupuesto_id_foreign');
            $table->dropColumn('presupuesto_id');
        });
    }
}
