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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('situacao_possui_reserva_solicitacao_distrato', 45);
            $table->longText('idempreendimento');
            $table->string('idempreendimento_int', 45);
            $table->string('nome_empreendimento', 200);
            $table->integer('idetapa');
            $table->integer('integer_int');
            $table->string('etapa', 45);
            $table->integer('idbloco');
            $table->integer('idbloco_int');
            $table->string('bloco', 45);
            $table->string('nome', 200);
            $table->string('area_privativa', 45);
            $table->string('idunidade', 45);
            $table->string('idunidade_int', 45);
            $table->string('vagas_garagem', 45);
            $table->string('andar', 45);
            $table->string('area_comum', 45);
            $table->integer('coluna');
            $table->string('posicao', 45);
            $table->string('tipologia', 200);
            $table->string('tipo', 200);
            $table->string('idtipo_int', 45);
            $table->string('empresa_terceirizacao', 200);
            $table->string('valor_avaliacao', 45);
            $table->string('data_bloqueio', 45);
            $table->string('data_entrega', 45);
            $table->string('agendar_a_partir', 45);
            $table->string('liberar_a_partir', 45);
            $table->longText('nome_referencia');
            $table->longText('valor');
            $table->integer('situacao_reservada');
            $table->string('situacao_reservada_vencimento', 45);
            $table->integer('situacao_reservada_idsituacao');
            $table->string('situacao_reservada_nomesituacao', 45);
            $table->string('siuacao_cor_bg', 45);
            $table->string('situacao_cor_nome', 45);
            $table->string('situacao_nome', 45);
            $table->string('situacao_reservada_inicio', 45);
            $table->integer('situacao_vendida');
            $table->integer('situacao_vendida_idsituacao');
            $table->integer('situacao_idmotivo');
            $table->string('situacao_bloqueados_internos', 45);
            $table->string('situacao_bloqueada', 45);
            $table->integer('situacao_bloqueada_idmotivo');
            $table->string('situacao_bloqueada_motivo', 200);
            $table->integer('situacao_tipo_id');
            $table->string('situacao_tipo_nome', 45);
            $table->integer('situacao_para_venda');
            $table->integer('situacao_mapa_disponibilidade');
            $table->longText('plantas');

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
        Schema::dropIfExists('unidades');
    }
};
