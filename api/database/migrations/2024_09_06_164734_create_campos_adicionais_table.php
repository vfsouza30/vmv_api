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
        Schema::create('campos_adicionais', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idcampo');
            $table->string('campo_nome', 200);
            $table->integer('idfuncionalidade');
            $table->string('funcionalidade', 200);
            $table->string('valor', 45);
            $table->string('data_cad', 45);
            $table->string('data_modificacao', 45);

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
        Schema::dropIfExists('campos_adicionais');
    }
};
