<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Restaurantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurantes',function(Blueprint $table){
        $table->integer('idres')->autoIncrement();
        $table->string('razonsocial');
        $table->string('nombrecontacto');
        $table->string('correo');
        $table->string('telefono');
        $table->string('rfc');
        $table->string('cp');

        $table->integer('idcat');
        $table->integer('idest');
        $table->integer('idmun');
        $table->foreign('idcat')->references('idcat')->on('categorias');
        $table->foreign('idest')->references('idest')->on('estados');
        $table->foreign('idmun')->references('idmun')->on('municipios');

        $table->rememberToken();
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
        Schema::drop('restaurantes');
    }
}
