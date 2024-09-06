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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->integer('idcorretor');
            $table->string('documento', 200);
            $table->string('nome', 200);
            $table->string('sexo', 45);
            $table->string('imobiliaria', 200);
            $table->string('categoria', 45);
            $table->string('nivel', 45);
            $table->string('participa_roleta_online', 45);
            $table->string('classificacao', 45);
            $table->string('codigointerno', 45);
            $table->string('identificador', 45);
            $table->string('tipo_creci', 45);
            $table->string('creci', 45);
            $table->string('situacao_creci', 45);
            $table->string('estado_creci', 45);
            $table->string('cidade_creci', 200);
            $table->string('vencimento_creci', 45);
            $table->string('ativo_login', 45);
            $table->string('profissional_data_inicio', 45);
            $table->string('apelido', 200);

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
