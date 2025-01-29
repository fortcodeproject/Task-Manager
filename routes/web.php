<?php

use App\Livewire\PaginaInicial\Index;
use App\Livewire\Usuario\{
    Autenticacao,
    Perfil, 
    ActualizarDados,
    AlterarSenha,
    Criar as CriarUsuario,
    Listar as ListarUsuario
};
use App\Livewire\Tarefa\{
    Criar as CriarTarefa,
    Listar as ListarTarefa
};
use App\Livewire\PermissaoTarefa\{
    Alterar as AlterarPermissaoTarefa,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get("/inicio", Index::class)->name("inicio");

Route::prefix("/usuario")->name("usuario.")->group(function(){
    Route::get("/autenticacao", Autenticacao::class)->name("autenticacao");
    Route::get("/perfil/{idUsuario}", Perfil::class)->name("perfil");
    Route::get("/actualizar/dados/{idUsuario}", ActualizarDados::class)->name("actualizar.dados");
    Route::get("/alterar/senha", AlterarSenha::class)->name("alterar.senha");
    Route::get("/criar", CriarUsuario::class)->name("criar");
    Route::get("/listar", ListarUsuario::class)->name("listar");
    Route::get("/sair", function() {
        Auth::logout();
        return redirect()->route("usuario.autenticacao");
    })->name("sair");
});

Route::prefix("/tarefa")->name("tarefa.")->group(function(){
    Route::get("/criar", CriarTarefa::class)->name("criar");
    Route::get("/listar", ListarTarefa::class)->name("listar");
});

Route::prefix("/tarefa/permissao")->name("tarefa.permissao.")->group(function(){
    Route::get("/alterar", AlterarPermissaoTarefa::class)->name("alterar");
});

