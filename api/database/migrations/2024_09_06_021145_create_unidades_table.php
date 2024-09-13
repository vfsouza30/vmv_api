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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('situacao_possui_reserva_solicitacao_distrato', 45)->nullable();
            $table->longText('idempreendimento')->nullable();
            $table->string('idempreendimento_int', 45)->nullable();
            $table->string('nome_empreendimento', 200)->nullable();
            $table->integer('idetapa')->nullable();
            $table->integer('integer_int')->nullable();
            $table->string('etapa', 45)->nullable();
            $table->integer('idbloco')->nullable();
            $table->integer('idbloco_int')->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('nome', 200)->nullable();
            $table->string('area_privativa', 45)->nullable();
            $table->string('idunidade', 45)->nullable();
            $table->string('idunidade_int', 45)->nullable();
            $table->string('vagas_garagem', 45)->nullable();
            $table->string('andar', 45)->nullable();
            $table->string('area_comum', 45)->nullable();
            $table->integer('coluna')->nullable();
            $table->string('posicao', 45)->nullable();
            $table->string('tipologia', 200)->nullable();
            $table->string('tipo', 200)->nullable();
            $table->string('idtipo_int', 45)->nullable();
            $table->string('empresa_terceirizacao', 200)->nullable();
            $table->string('valor_avaliacao', 45)->nullable();
            $table->string('data_bloqueio', 45)->nullable();
            $table->string('data_entrega', 45)->nullable();
            $table->string('agendar_a_partir', 45)->nullable();
            $table->string('liberar_a_partir', 45)->nullable();
            $table->longText('nome_referencia')->nullable();
            $table->longText('valor')->nullable();
            $table->integer('situacao_reservada')->nullable();
            $table->string('situacao_reservada_vencimento', 45)->nullable();
            $table->integer('situacao_reservada_idsituacao')->nullable();
            $table->string('situacao_reservada_nomesituacao', 45)->nullable();
            $table->string('siuacao_cor_bg', 45)->nullable();
            $table->string('situacao_cor_nome', 45)->nullable();
            $table->string('situacao_nome', 45)->nullable();
            $table->string('situacao_reservada_inicio', 45)->nullable();
            $table->integer('situacao_vendida')->nullable();
            $table->integer('situacao_vendida_idsituacao')->nullable();
            $table->integer('situacao_idmotivo')->nullable();
            $table->string('situacao_bloqueados_internos', 45)->nullable();
            $table->string('situacao_bloqueada', 45)->nullable();
            $table->integer('situacao_bloqueada_idmotivo')->nullable();
            $table->string('situacao_bloqueada_motivo', 200)->nullable();
            $table->integer('situacao_tipo_id')->nullable();
            $table->string('situacao_tipo_nome', 45)->nullable();
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
