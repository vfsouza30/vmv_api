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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->integer('idpessoa');
            $table->string('idpessoa_int', 45);
            $table->string('idpessoa_legado', 45);
            $table->string('data_cad', 45);
            $table->string('ativo_painel', 45);
            $table->string('ativo_login', 45);
            $table->string('situacao', 45);
            $table->string('validado', 45);
            $table->double('renda_familar');

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
