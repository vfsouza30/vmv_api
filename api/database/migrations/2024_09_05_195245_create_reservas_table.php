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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->double('aprovacao_absoluto')->nullable();
            $table->double('aprovacao_vpl_valor')->nullable();
            $table->longText('aprovada')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('corretor')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('data_aprovacao')->nullable();
            $table->longText('data_cancelamento')->nullable();
            $table->longText('data_contrato')->nullable();
            $table->longText('data_primeira_aprovacao')->nullable();
            $table->longText('data_venda')->nullable();
            $table->longText('descricao_motivo_cancelamento')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->longText('empresa_correspondente')->nullable();
            $table->longText('grupo')->nullable();
            $table->integer('idcliente')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->integer('idgrupo')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->longText('idlead')->nullable();
            $table->integer('idmidia')->nullable();
            $table->integer('idprecadastro')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idsituacao_anterior')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('midia')->nullable();
            $table->longText('motivo_cancelamento')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('situacao_anterior')->nullable();
            $table->longText('situacao_comercial')->nullable();
            $table->double('valor_contrato')->nullable();
            $table->double('valor_fgts')->nullable();
            $table->double('valor_financiamento')->nullable();
            $table->double('valor_proposta')->nullable();
            $table->double('valor_subsidio')->nullable();
            $table->longText('venda')->nullable();
            $table->integer('idreserva')->nullable();


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
        Schema::dropIfExists('reservas');
    }
};
