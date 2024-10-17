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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->integer('idreserva')->nullable();
            $table->longText('idlead')->nullable();
            $table->longText('aprovada')->nullable();
            $table->longText('data_reserva')->nullable();
            $table->longText('data_venda')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('regiao')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('unidade')->nullable();
            $table->double('area_privativa')->nullable();
            $table->longText('cliente')->nullable();
            $table->integer('idcliente')->nullable();
            $table->longText('documento_cliente')->nullable();
            $table->longText('email')->nullable();
            $table->longText('cidade')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->double('renda')->nullable();
            $table->longText('sexo')->nullable();
            $table->integer('idade')->nullable();
            $table->longText('estado_civil')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('corretor')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('campanha')->nullable();
            $table->double('valor_contrato')->nullable();
            $table->integer('idmidia')->nullable();
            $table->longText('midia')->nullable();
            $table->longText('idtabela')->nullable();
            $table->longText('nometabela')->nullable();
            $table->longText('codigointernotabela')->nullable();
            $table->integer('idtipovenda')->nullable();
            $table->longText('tipovenda')->nullable();

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
        Schema::dropIfExists('vendas');
    }
};
