<?php

use App\Livewire\Usuario\{
    Autenticacao
};
use Illuminate\Support\Facades\Route;

Route::prefix("/usuario")->name("usuario.")->group(function(){
    Route::get("/autenticacao", Autenticacao::class)->name("autenticacao");
});
