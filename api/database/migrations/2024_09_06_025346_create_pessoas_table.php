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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->integer('idpessoa')->nullable();
            $table->longText('idpessoa_int')->nullable();
            $table->longText('idpessoa_legado')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('ativo_painel')->nullable();
            $table->longText('ativo_login')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('validado')->nullable();
            $table->double('renda_familiar')->nullable();

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
        Schema::dropIfExists('pessoas');
    }
};
