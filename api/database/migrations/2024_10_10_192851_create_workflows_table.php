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
        Schema::create('workflows', function (Blueprint $table) {
            $table->id();
            $table->integer('ordem')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->longText('nome')->nullable();
            $table->longText('cor_bg')->nullable();
            $table->longText('cor_nome')->nullable();
            $table->json('flags')->nullable();
            $table->longText('tabela_nome')->nullable();
            
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
        Schema::dropIfExists('workflows');
    }
};
