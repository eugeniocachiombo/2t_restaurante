<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/migrate', function () {
    try {
        Artisan::call("migrate");
        return "Projecto configurado, <h1>(criação do banco de dados, migração dos dados)<h1>";
    } catch (\Throwable $th) {
        return view('livewire.auth.error');
    }
});
