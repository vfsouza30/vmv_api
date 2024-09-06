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
        Schema::create('leads_visitas', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->integer('idtarefa');
            $table->integer('idinteracao');
            $table->integer('idlead');
            $table->string('data_cad', 45);
            $table->string('data', 45);
            $table->integer('idresponsavel');
            $table->string('responsavel', 200);
            $table->string('tipo_responsavel', 45);
            $table->string('situacao', 45);
            $table->string('tipo_interacao', 45);
            $table->string('idtipo_visita', 45);
            $table->string('nome_tipo_visita', 45);
            $table->string('funcionalidade', 45);
            $table->string('data_conclusao', 45);
            $table->string('pdv', 200);
            $table->string('visita_virtual', 45);
            $table->integer('idempreendimento');
            $table->string('nome_empreendimento', 200);

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
        Schema::dropIfExists('leads_visitas');
    }
};
