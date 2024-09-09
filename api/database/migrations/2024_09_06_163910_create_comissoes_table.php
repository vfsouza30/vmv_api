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
        Schema::create('comissoes', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idcomissao');
            $table->string('situacao', 45);
            $table->integer('idsituacao');
            $table->integer('idreserva');
            $table->string('corretor', 200);
            $table->string('imobiliaria', 200);
            $table->string('empreendimento', 200);
            $table->string('bloco', 45);
            $table->string('etapa', 45);
            $table->string('unidade', 45);
            $table->string('regiao', 45);
            $table->string('cliente', 200);
            $table->string('cep_cliente', 45);

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
        Schema::dropIfExists('comissoes');
    }
};
