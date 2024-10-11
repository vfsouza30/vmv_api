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
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('situacao_possui_reserva_solicitacao_distrato')->nullable();
            $table->longText('idempreendimento')->nullable();
            $table->longText('idempreendimento_int')->nullable();
            $table->longText('nome_empreendimento')->nullable();
            $table->integer('idetapa')->nullable();
            $table->longText('idetapa_int')->nullable();
            $table->longText('etapa')->nullable();
            $table->integer('idbloco')->nullable();
            $table->longText('idbloco_int')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('nome')->nullable();
            $table->longText('area_privativa')->nullable();
            $table->longText('idunidade')->nullable();
            $table->longText('idunidade_int')->nullable();
            $table->longText('vagas_garagem')->nullable();
            $table->longText('andar')->nullable();
            $table->longText('area_comum')->nullable();
            $table->integer('coluna')->nullable();
            $table->longText('posicao')->nullable();
            $table->longText('tipologia')->nullable();
            $table->longText('tipo')->nullable();
            $table->longText('idtipo_int')->nullable();
            $table->longText('empresa_terceirizacao')->nullable();
            $table->longText('valor_avaliacao')->nullable();
            $table->longText('data_bloqueio')->nullable();
            $table->longText('data_entrega')->nullable();
            $table->longText('agendar_a_partir')->nullable();
            $table->longText('liberar_a_partir')->nullable();
            $table->longText('nome_referencia')->nullable();
            $table->longText('valor')->nullable();
            $table->integer('situacao_reservada')->nullable();
            $table->longText('situacao_reservada_vencimento')->nullable();
            $table->integer('situacao_reservada_idsituacao')->nullable();
            $table->longText('situacao_reservada_nomesituacao')->nullable();
            $table->longText('situacao_cor_bg')->nullable();
            $table->longText('situacao_cor_nome')->nullable();
            $table->longText('situacao_nome')->nullable();
            $table->longText('situacao_reservada_inicio')->nullable();
            $table->integer('situacao_vendida')->nullable();
            $table->integer('situacao_vendida_idsituacao')->nullable();
            $table->integer('situacao_idmotivo')->nullable();
            $table->longText('situacao_bloqueados_internos')->nullable();
            $table->longText('situacao_bloqueada')->nullable();
            $table->integer('situacao_bloqueada_idmotivo')->nullable();
            $table->longText('situacao_bloqueada_motivo')->nullable();
            $table->integer('situacao_tipo_id')->nullable();
            $table->longText('situacao_tipo_nome')->nullable();
            $table->integer('situacao_para_venda')->nullable();
            $table->integer('situacao_mapa_disponibilidade')->nullable();
            $table->longText('plantas')->nullable();

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
