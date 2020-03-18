<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContribuyentesToPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->bigInteger('contribuyente_id')->unsigned();
            $table->bigInteger('estado')->unsigned()->default(1);
            $table->string('motivobaja')->nullable();
            $table->date('fechabaja')->nullable();
            $table->foreign('contribuyente_id')->references('id')->on('contribuyentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('pagos_contribuyente_id_foreign');
            $table->dropColumn('contribuyente_id');
            $table->dropColumn('estado');
            $table->dropColumn('motivobaja');
            $table->dropColumn('fechabaja');
        });
    }
}
