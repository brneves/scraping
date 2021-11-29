<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcacoes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('servico_id');
            $table->unsignedBigInteger('tipo_marcacao_id');
            $table->unsignedBigInteger('provedores_id');
            $table->string('marcacao');
            $table->string('url');
            $table->timestamps();

            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->foreign('tipo_marcacao_id')->references('id')->on('tipos_marcacao');
            $table->foreign('provedores_id')->references('id')->on('provedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcacoes');
    }
}
