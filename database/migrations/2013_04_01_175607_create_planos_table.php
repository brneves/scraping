<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->id();
            $table->string('plano')->unique();
            $table->string('slug');
            $table->string('descricao')->nullable();
            $table->integer('preco');
            $table->string('stripe_id')->nullable();
            $table->boolean('recomendado')->default(0)->comment('Define se terá uma sinalização de plano recomendado');
            $table->enum('cobranca', ['Mensal', 'Anual'])->default('Mensal');
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
        Schema::dropIfExists('planos');
    }
}
