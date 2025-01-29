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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->text("descricao");
            $table->enum("estado", ["pendente", "em andamento", "finalizado"])->default("pendente");
            $table->unsignedBigInteger('usuario_especifico')->nullable();
            $table->foreign("usuario_especifico")->references("id")->on("users")->onDelete("cascade");
            $table->enum("situacao", ["activa", "inactiva"])->default("activa");
            $table->unsignedBigInteger('criador');
            $table->foreign("criador")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger('realizador')->nullable();
            $table->foreign("realizador")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
