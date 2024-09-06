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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->double('aprovacao_absoluto');
            $table->double('aprovacao_vpl_valor');
            $table->string('aprovada', 45);
            $table->string('bloco', 45);
            $table->string('corretor', 200);
            $table->string('data_cad', 45);
            $table->string('data_aprovacao', 45);
            $table->string('data_cancelamento', 45);
            $table->string('data_contrato', 45);
            $table->string('data_primeira_aprovacao', 45);
            $table->string('data_venda', 45);
            $table->longText('descricao_motivo_cancelamento');
            $table->string('empreendimento', 200);
            $table->string('empresa_correspondente', 200);
            $table->string('grupo', 200);
            $table->integer('idcliente');
            $table->integer('idcorretor');
            $table->integer('idempreendimento');
            $table->integer('idgrupo');
            $table->integer('idimobiliaria');
            $table->integer('idlead');
            $table->integer('idmidia');
            $table->integer('idprecadastro');
            $table->integer('idsituacao');
            $table->integer('idsituacao_anterior');
            $table->string('imobiliaria', 200);
            $table->string('midia', 45);
            $table->string('motivo_cancelamento', 200);
            $table->string('situacao', 45);
            $table->string('situacao_anterior', 45);
            $table->string('situacao_comercial', 45);
            $table->double('valor_contrato');
            $table->double('valor_fgts');
            $table->double('valor_financiamento');
            $table->double('valor_proposta');
            $table->double('valor_subsidio');
            $table->string('venda', 45);
            $table->integer('id_reserva');


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
