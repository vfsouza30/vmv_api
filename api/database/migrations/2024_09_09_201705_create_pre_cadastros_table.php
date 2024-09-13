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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('cep_cliente', 45)->nullable();
            $table->string('corretor', 200)->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('data_ultima_alteracao_situacao', 45)->nullable();
            $table->longText('descricao_motivo_cancelamento')->nullable();
            $table->longText('descricao_motivo_reprovacao')->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('idlead')->nullable();
            $table->integer('idmotivo_cancelamento')->nullable();
            $table->integer('idmotivo_reprovacao')->nullable();
            $table->integer('idpessoa')->nullable();
            $table->integer('idprecadastro')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idsituacao_anterior')->nullable();
            $table->string('motivo_cancelamento', 200)->nullable();
            $table->string('motivo_reprovacao', 200)->nullable();
            $table->longText('observacoes')->nullable();
            $table->string('pessoa', 200)->nullable();
            $table->string('prazo', 45)->nullable();
            $table->double('saldo_devedor')->nullable();
            $table->string('situacao', 45)->nullable();
            $table->string('situacao_anterior', 45)->nullable();
            $table->string('sla_vencimento', 45)->nullable();
            $table->string('usuario_correspondente', 200)->nullable();
            $table->double('valor_aprovado')->nullable();
            $table->double('valor_avaliacao')->nullable();
            $table->double('valor_fgts')->nullable();
            $table->double('valor_prestacao')->nullable();
            $table->double('valor_subsidio')->nullable();
            $table->double('valor_total')->nullable();
            $table->string('vencimento_aprovacao', 45)->nullable();


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
