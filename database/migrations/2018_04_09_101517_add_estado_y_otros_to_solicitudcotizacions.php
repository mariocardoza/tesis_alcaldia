<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoYOtrosToSolicitudcotizacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudcotizacions', function (Blueprint $table) {
            $table->integer('estado')->default(1);
            $table->string('motivobaja')->nullable();
            $table->date('fechabaja')->nullable();
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
            $table->dropColumn('estado');
            $table->dropColumn('motivobaja');
            $table->dropColumn('fechabaja');
        });
    }
}
