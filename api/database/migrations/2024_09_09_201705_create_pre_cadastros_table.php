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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('cep_cliente', 45);
            $table->string('corretor', 200);
            $table->string('data_cad', 45);
            $table->string('data_ultima_alteracao_situacao', 45);
            $table->longText('descricao_motivo_cancelamento');
            $table->longText('descricao_motivo_reprovacao');
            $table->string('empreendimento', 200);
            $table->integer('idcorretor');
            $table->longText('idlead');
            $table->integer('idmotivo_cancelamento');
            $table->integer('idmotivo_reprovacao');
            $table->integer('idpessoa');
            $table->integer('idprecadastro');
            $table->integer('idsituacao');
            $table->integer('idsituacao_anterior');
            $table->string('motivo_cancelamento', 200);
            $table->string('motivo_reprovacao', 200);
            $table->longText('observacoes');
            $table->string('pessoa', 200);
            $table->string('prazo', 45);
            $table->double('saldo_devedor');
            $table->string('situacao', 45);
            $table->string('situacao_anterior', 45);
            $table->string('sla_vencimento', 45);
            $table->string('usuario_correspondente', 200);
            $table->double('valor_aprovado');
            $table->double('valor_avaliacao');
            $table->double('valor_fgts');
            $table->double('valor_prestacao');
            $table->double('valor_subsidio');
            $table->double('valor_total');
            $table->string('vencimento_aprovacao', 45);


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
