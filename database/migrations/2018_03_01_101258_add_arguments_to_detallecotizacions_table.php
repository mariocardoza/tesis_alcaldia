<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArgumentsToDetallecotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detallecotizacions', function (Blueprint $table) {
            $table->string('descripcion')->after('cotizacion_id');
            $table->string('marca')->nullable()->after('descripcion');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallecotizacions', function (Blueprint $table) {
            $table->dropColumn('descripcion');
            $table->dropColumn('marca');
        });
    }
}
