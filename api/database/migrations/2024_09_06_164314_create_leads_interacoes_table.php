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
        Schema::create('leads_interacoes', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->integer('idinteracao');
            $table->integer('idlead');
            $table->string('data_cad', 45);
            $table->integer('idcorretor');
            $table->string('corretor', 200);
            $table->integer('idimobiliaria');
            $table->string('imobiliaria', 200);
            $table->string('tipo', 45);
            $table->string('situacao', 45);
            $table->longText('descricao');
            $table->string('gestor_interacao', 200);

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
        Schema::dropIfExists('leads_interacoes');
    }
};
