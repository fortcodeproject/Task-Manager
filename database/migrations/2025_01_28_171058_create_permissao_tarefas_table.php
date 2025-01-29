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
        Schema::create('permissao_tarefas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tarefa');
            $table->enum("editar", ["permitido", "nao permitido"])->default("nao permitido");
            $table->enum("eliminar", ["permitido", "nao permitido"])->default("nao permitido");
            $table->enum("leitura", ["permitido", "nao permitido"])->default("nao permitido");
            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("id_tarefa")->references("id")->on("tarefas")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissao_tarefas');
    }
};
