<?php

use App\Livewire\PaginaInicial\Index;
use App\Livewire\Usuario\{
    Autenticacao,
    Perfil, 
    ActualizarDados,
    AlterarSenha
};
use App\Livewire\Tarefa\{
    Criar,
    Listar
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get("/inicio", Index::class)->name("inicio");

Route::prefix("/usuario")->name("usuario.")->group(function(){
    Route::get("/autenticacao", Autenticacao::class)->name("autenticacao");
    Route::get("/perfil/{idUsuario}", Perfil::class)->name("perfil");
    Route::get("/actualizar/dados/{idUsuario}", ActualizarDados::class)->name("actualizar.dados");
    Route::get("/alterar/senha", AlterarSenha::class)->name("alterar.senha");
    Route::get("/sair", function() {
        Auth::logout();
        return redirect()->route("usuario.autenticacao");
    })->name("sair");
});

Route::prefix("/tarefa")->name("tarefa.")->group(function(){
    Route::get("/criar", Criar::class)->name("criar");
    Route::get("/listar", Listar::class)->name("listar");
});

