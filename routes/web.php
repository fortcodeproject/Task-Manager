<?php

use App\Livewire\PaginaInicial\Index;
use App\Livewire\Usuario\{
    Autenticacao
};
use Illuminate\Support\Facades\Route;


Route::get("/inicio", Index::class)->name("inicio");

Route::prefix("/usuario")->name("usuario.")->group(function(){
    Route::get("/autenticacao", Autenticacao::class)->name("autenticacao");
});

