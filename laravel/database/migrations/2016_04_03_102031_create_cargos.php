<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_encontrista')->unsigned();
            $table->integer('cargo')->unsigned();
            $table->integer('grupo')->unsigned();
            $table->foreign('id_encontrista')->references('id_encontrista')->on('encontrista');
            $table->foreign('cargo')->references('id_tipo')->on('tipo_cargos');
            $table->foreign('grupo')->references('id_grupo')->on('grupos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cargos');
    }
}
