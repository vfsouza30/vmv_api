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
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idreserva')->nullable();
            $table->longText('data_criacao_reserva')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('unidade')->nullable();
            $table->integer('idunidade')->nullable();
            $table->longText('cliente')->nullable();
            $table->integer('idcliente')->nullable();
            $table->longText('corretor')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('flag_inicio')->nullable();
            $table->longText('data_flag_inicio')->nullable();
            $table->longText('flag_inicio_semproposta')->nullable();
            $table->longText('data_flag_inicio_semproposta')->nullable();
            $table->longText('flag_vencida')->nullable();
            $table->longText('data_flag_vencida')->nullable();
            $table->longText('flag_vendida')->nullable();
            $table->longText('data_flag_vendida')->nullable();
            $table->longText('flag_distrato')->nullable();
            $table->longText('data_flag_distrato')->nullable();
            $table->longText('flag_analisada')->nullable();
            $table->longText('data_flag_analisada')->nullable();
            $table->longText('flag_aprovada')->nullable();
            $table->longText('data_flag_aprovada')->nullable();
            $table->longText('flag_aprovada_comercial')->nullable();
            $table->longText('data_flag_aprovada_comercial')->nullable();
            $table->longText('flag_vender_sienge')->nullable();
            $table->longText('data_flag_vender_sienge')->nullable();
            $table->longText('flag_cancelada_sienge')->nullable();
            $table->longText('data_flag_pode_faturar')->nullable();
            $table->longText('flag_documentos')->nullable();
            $table->longText('data_flag_documentos')->nullable();
            $table->longText('flag_contrato')->nullable();
            $table->longText('data_flag_contrato')->nullable();
            $table->longText('flag_aguardando_faturamento')->nullable();
            $table->longText('data_flag_aguardando_faturamento')->nullable();
            $table->longText('flag_faturada')->nullable();
            $table->longText('data_flag_faturada')->nullable();
            $table->longText('flag_pendente_assinatura_eletronica')->nullable();
            $table->longText('data_flag_pendente_assinatura_eletronica')->nullable();
            $table->longText('flag_pendente_assinatura_eletronica_segundo_envelope')->nullable();
            $table->longText('data_flag_pendente_assinuatura_eletr_seg_env')->nullable();
            $table->longText('flag_assinatura_clientes_associados')->nullable();
            $table->longText('data_flag_assinatura_clientes_associados')->nullable();
            $table->longText('flag_assinatura_todas_partes')->nullable();
            $table->longText('data_flag_assinatura_todas_partes')->nullable();
            $table->longText('flag_reprovada_comercial')->nullable();
            $table->longText('data_flag_reprovada_comercial')->nullable();
            $table->longText('flag_pendente_comercial')->nullable();
            $table->longText('data_flag_pendente_comercial')->nullable();
            $table->longText('flag_devolucao_erp')->nullable();
            $table->longText('data_flag_devolucao_erp')->nullable();


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
