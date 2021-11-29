<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_id')->constrained()->cascadeOnDelete();
            $table->uuid('uuid');
            $table->string('cpf_cnpj')->unique();
            $table->string('nome');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();
            $table->string('porcentagem')->nullable()->comment('Porcentagem padrão cobrada em cima do preço de compra para calcular o preco de venda do produto');
            $table->boolean('status')->default(true);
            $table->date('data_inscricao');
            $table->date('data_expiracao');
            $table->string('reference_transaction')->nullable();
            $table->enum('inscricao_status', ['Inativo', 'Ativo', 'Suspenso'])->default('Inativo');
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
        Schema::dropIfExists('tenants');
    }
}
