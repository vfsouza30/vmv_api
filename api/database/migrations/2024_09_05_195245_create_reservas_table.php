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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->double('aprovacao_absoluto')->nullable();
            $table->double('aprovacao_vpl_valor')->nullable();
            $table->string('aprovada', 45)->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('corretor', 200)->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('data_aprovacao', 45)->nullable();
            $table->string('data_cancelamento', 45)->nullable();
            $table->string('data_contrato', 45)->nullable();
            $table->string('data_primeira_aprovacao', 45)->nullable();
            $table->string('data_venda', 45)->nullable();
            $table->longText('descricao_motivo_cancelamento')->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->string('empresa_correspondente', 200)->nullable();
            $table->string('grupo', 200)->nullable();
            $table->integer('idcliente')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->integer('idgrupo')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->integer('idlead')->nullable();
            $table->integer('idmidia')->nullable();
            $table->integer('idprecadastro')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idsituacao_anterior')->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->string('midia', 45)->nullable();
            $table->string('motivo_cancelamento', 200)->nullable();
            $table->string('situacao', 45)->nullable();
            $table->string('situacao_anterior', 45)->nullable();
            $table->string('situacao_comercial', 45)->nullable();
            $table->double('valor_contrato')->nullable();
            $table->double('valor_fgts')->nullable();
            $table->double('valor_financiamento')->nullable();
            $table->double('valor_proposta')->nullable();
            $table->double('valor_subsidio')->nullable();
            $table->string('venda', 45)->nullable();
            $table->integer('id_reserva')->nullable();


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
