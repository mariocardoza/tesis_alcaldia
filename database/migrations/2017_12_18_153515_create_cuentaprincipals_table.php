<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaprincipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentaprincipals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_de_cuenta');
            $table->string('banco');
            $table->integer('anio');
            $table->double('monto_inicial',8,2);
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentaprincipals');
    }
}
