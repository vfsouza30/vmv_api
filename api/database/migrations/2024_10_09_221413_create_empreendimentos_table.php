<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empreendimentos', function (Blueprint $table) {
            $table->id();
            $table->longText('idempreendimento')->nullable();
            $table->longText('idempreendimento_int')->nullable();
            $table->longText('nome')->nullable();
            $table->longText('regiao')->nullable();
            $table->longText('cidade')->nullable();
            $table->longText('estado')->nullable();
            $table->longText('bairro')->nullable();
            $table->longText('endereco_emp')->nullable();
            $table->longText('numero')->nullable();
            $table->longText('logradouro')->nullable();
            $table->longText('cep')->nullable();
            $table->longText('endereco')->nullable();
            $table->integer('idempresa')->nullable();
            $table->longText('sigla')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('foto_listagem')->nullable();
            $table->longText('foto')->nullable();
            $table->longText('app_exibir')->nullable();
            $table->longText('app_cor_background')->nullable();
            $table->longText('data_entrega')->nullable();
            $table->json('situacao_obra')->nullable();
            $table->json('situacao_comercial')->nullable();
            $table->json('tipo_empreendimento')->nullable();
            $table->json('segmento')->nullable();
            
            $table->unsignedBigInteger('clientes_id');
            $table->timestamps();

            $table->foreign('clientes_id')->references('id')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empreendimentos');
    }
};
