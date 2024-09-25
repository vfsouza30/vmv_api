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
        Schema::create('corretores', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('documento')->nullable();
            $table->longText('nome')->nullable();
            $table->longText('sexo')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('categoria')->nullable();
            $table->longText('nivel')->nullable();
            $table->longText('participa_roleta_online')->nullable();
            $table->longText('classificacao')->nullable();
            $table->longText('codigointerno')->nullable();
            $table->longText('identificador')->nullable();
            $table->longText('tipo_creci')->nullable();
            $table->longText('creci')->nullable();
            $table->longText('situacao_creci')->nullable();
            $table->longText('estado_creci')->nullable();
            $table->longText('cidade_creci')->nullable();
            $table->longText('vencimento_creci')->nullable();
            $table->longText('ativo_login')->nullable();
            $table->longText('profissional_data_inicio')->nullable();
            $table->longText('apelido')->nullable();

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
        Schema::dropIfExists('corretores');
    }
};
