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
        Schema::create('leads_workflow_tempos', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idtempo')->nullable();
            $table->integer('idlead')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('tempo')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('sigla')->nullable();
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
        Schema::dropIfExists('leads_workflow_tempos');
    }
};
