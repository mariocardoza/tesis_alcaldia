<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumeroSolicitudASolicitudcotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudcotizacions', function (Blueprint $table) {
            $table->dropColumn('datos_contenido');
            $table->string('numero_solicitud')->nullable();
            $table->date('fecha_limite')->nullable();
            $table->string('tiempo_entrega')->nullable();
            $table->dropForeign('solicitudcotizacions_presupuesto_id_foreign');
            $table->dropColumn('presupuesto_id');
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
            $table->string('datos_contenido')->nullable();
            $table->dropColumn('numero_solicitud');
            $table->dropColumn('fecha_limite');
            $table->dropColumn('tiempo_entrega');
            $table->bigInteger('presupuesto_id')->unsigned();
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');
        });
    }
}
