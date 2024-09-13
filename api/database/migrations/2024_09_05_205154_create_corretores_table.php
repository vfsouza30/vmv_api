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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->integer('idcorretor')->nullable();
            $table->string('documento', 200)->nullable();
            $table->string('nome', 200)->nullable();
            $table->string('sexo', 45)->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->string('categoria', 45)->nullable();
            $table->string('nivel', 45)->nullable();
            $table->string('participa_roleta_online', 45)->nullable();
            $table->string('classificacao', 45)->nullable();
            $table->string('codigointerno', 45)->nullable();
            $table->string('identificador', 45)->nullable();
            $table->string('tipo_creci', 45)->nullable();
            $table->string('creci', 45)->nullable();
            $table->string('situacao_creci', 45)->nullable();
            $table->string('estado_creci', 45)->nullable();
            $table->string('cidade_creci', 200)->nullable();
            $table->string('vencimento_creci', 45)->nullable();
            $table->string('ativo_login', 45)->nullable();
            $table->string('profissional_data_inicio', 45)->nullable();
            $table->string('apelido', 200)->nullable();

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
