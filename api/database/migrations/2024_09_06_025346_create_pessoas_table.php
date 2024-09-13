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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->integer('idpessoa')->nullable();
            $table->string('idpessoa_int', 45)->nullable();
            $table->string('idpessoa_legado', 45)->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('ativo_painel', 45)->nullable();
            $table->string('ativo_login', 45)->nullable();
            $table->string('situacao', 45)->nullable();
            $table->string('validado', 45)->nullable();
            $table->double('renda_familar')->nullable();

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
