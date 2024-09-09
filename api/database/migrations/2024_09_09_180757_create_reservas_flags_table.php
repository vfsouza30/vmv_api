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
        Schema::create('reservas_flags', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->longText('ativo', 45);
            $table->integer('idreserva');
            $table->longText('data_criacao_reserva', 45);
            $table->longText('empreendimento', 200);
            $table->integer('idempreendimento');
            $table->longText('bloco', 45);
            $table->longText('unidade', 45);
            $table->integer('idunidade');
            $table->longText('cliente', 200);
            $table->integer('idcliente');
            $table->longText('corretor', 200);
            $table->integer('idcorretor');
            $table->longText('flag_inicio', 45);
            $table->longText('data_entrada_flag_inicio', 45);
            $table->longText('flag_inicio_semproposta', 45);
            $table->longText('data_entrada_flag_inicio_semproposta', 45);
            $table->longText('flag_vencida', 45);
            $table->longText('data_entrada_flag_vencida', 45);
            $table->longText('flag_vendida', 45);
            $table->longText('data_entrada_flag_vendida', 45);
            $table->longText('flag_distrato', 45);
            $table->longText('data_entrada_flag_distrato', 45);
            $table->longText('flag_alisada', 45);
            $table->longText('data_entrada_flag_analisada', 45);
            $table->longText('flag_aprovada', 45);
            $table->longText('data_entrada_flag_aprovada', 45);
            $table->longText('flag_aprovada_comercial', 45);
            $table->longText('data_entrada_flag_aprovada_comercial', 45);
            $table->longText('flag_vender_sienge', 45);
            $table->longText('data_entrada_flag_vender_sienge', 45);
            $table->longText('flag_cancelada_sienge', 45);
            $table->longText('data_entrada_flag_pode_faturar', 45);
            $table->longText('flag_documentos', 45);
            $table->longText('data_entrada_flag_documentos', 45);
            $table->longText('flag_contrato', 45);
            $table->longText('data_entrada_flag_contrato', 45);
            $table->longText('flag_aguardando_faturamento', 45);
            $table->longText('data_entrada_flag_aguardando_faturamento', 45);
            $table->longText('flag_faturada', 45);
            $table->longText('data_entrada_flag_faturada', 45);
            $table->longText('flag_pendente_assinatura_eletronica', 45);
            $table->longText('data_entrada_flag_pendente_assinatura_eletronica', 45);
            $table->longText('flag_pendente_assinatura_eletronica_segundo_envelope', 45);
            $table->longText('data_entrada_flag_pendente_assinuatura_eletr_seg_env', 45);
            $table->longText('flag_assinatura_clientes_associados', 45);
            $table->longText('data_entrada_flag_assinatura_clientes_associados', 45);
            $table->longText('flag_assinatura_todas_partes', 45);
            $table->longText('data_entrada_flag_assinatura_todas_partes', 45);
            $table->longText('flag_reprovada_comercial', 45);
            $table->longText('data_entrada_flag_reprovada_comercial', 45);
            $table->longText('flag_pendente_comercial', 45);
            $table->longText('data_entrada_flag_pendente_comercial', 45);
            $table->longText('flag_devolucao_erp', 45);
            $table->longText('data_entrada_flag_devolucao_erp', 45);


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
        Schema::dropIfExists('reservas__flags');
    }
};
