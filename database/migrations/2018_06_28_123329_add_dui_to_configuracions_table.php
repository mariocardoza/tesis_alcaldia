<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDuiToConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuracions', function (Blueprint $table) {
            $table->string('nombre_alcalde')->nullable();
            $table->date('nacimiento_alcalde')->nullable();
            $table->string('oficio_alcalde')->nullable();
            $table->string('domicilio_alcalde')->nullable();
            $table->string('dui_alcalde')->nullable();
            $table->string('nit_alcalde')->nullable();
            $table->date('inicio_periodo')->nullable();
            $table->date('fin_periodo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuracions', function (Blueprint $table) {
            $table->dropColumn('nombre_alcalde');
            $table->dropColumn('nacimiento_alcalde');
            $table->dropColumn('oficio_alcalde');
            $table->dropColumn('domicilio_alcalde');
            $table->dropColumn('dui_alcalde');
            $table->dropColumn('nit_alcalde');
            $table->dropColumn('inicio_periodo');
            $table->dropColumn('fin_periodo');
        });
    }
}
