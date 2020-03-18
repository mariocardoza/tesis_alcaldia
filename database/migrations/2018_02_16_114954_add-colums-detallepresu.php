<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsDetallepresu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuestodetalles', function (Blueprint $table) {
            $table->integer('item')->before('material');
            $table->string('categoria')->after('item');
            $table->string('unidad')->after('preciou');
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
            $table->dropColumn('item');
            $table->dropColumn('categoria');
            $table->dropColumn('unidad');
        });
    }
}
