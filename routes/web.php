<?php

use App\Livewire\PaginaInicial\Index;
use App\Livewire\Usuario\{
    Autenticacao
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get("/inicio", Index::class)->name("inicio");

Route::prefix("/usuario")->name("usuario.")->group(function(){
    Route::get("/autenticacao", Autenticacao::class)->name("autenticacao");
    Route::get("/sair", function() {
        Auth::logout();
        return redirect()->route("usuario.autenticacao");
    })->name("sair");
});

