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
        Schema::create('pre_cadastros', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->longText('corretor')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('data_ultima_alteracao_situacao')->nullable();
            $table->longText('descricao_motivo_cancelamento')->nullable();
            $table->longText('descricao_motivo_reprovacao')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('idlead')->nullable();
            $table->integer('idmotivo_cancelamento')->nullable();
            $table->integer('idmotivo_reprovacao')->nullable();
            $table->integer('idpessoa')->nullable();
            $table->integer('idprecadastro')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idsituacao_anterior')->nullable();
            $table->longText('motivo_cancelamento')->nullable();
            $table->longText('motivo_reprovacao')->nullable();
            $table->longText('observacoes')->nullable();
            $table->longText('pessoa')->nullable();
            $table->longText('prazo')->nullable();
            $table->double('saldo_devedor')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('situacao_anterior')->nullable();
            $table->longText('sla_vencimento')->nullable();
            $table->longText('usuario_correspondente')->nullable();
            $table->double('valor_aprovado')->nullable();
            $table->double('valor_avaliacao')->nullable();
            $table->double('valor_fgts')->nullable();
            $table->double('valor_prestacao')->nullable();
            $table->double('valor_subsidio')->nullable();
            $table->double('valor_total')->nullable();
            $table->longText('vencimento_aprovacao')->nullable();


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
        Schema::dropIfExists('pre_cadastros');
    }
};
