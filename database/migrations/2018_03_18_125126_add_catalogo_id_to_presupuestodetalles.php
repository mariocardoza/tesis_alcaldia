<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatalogoIdToPresupuestodetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuestodetalles', function (Blueprint $table) {
            $table->dropColumn('material');
            $table->dropColumn('item');
            $table->dropColumn('categoria');
            $table->dropColumn('unidad');
            $table->bigInteger('catalogo_id')->unsigned();
            $table->foreign('catalogo_id')->references('id')->on('catalogos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presupuestodetalles', function (Blueprint $table) {
            $table->string('material')->nullable();
            $table->integer('item')->nullable();
            $table->string('categoria')->nullable();
            $table->string('unidad')->nullable();
            $table->dropForeign('presupuestodetalles_catalogo_id_foreign');
            $table->dropColumn('catalogo_id');
        });
    }
}
