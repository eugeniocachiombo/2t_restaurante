<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/migrate', function () {
    try {
        Artisan::call("db:seed");
        return "Projecto configurado, <h1>(criação do banco de dados, migração dos dados)<h1>";
    } catch (\Throwable $th) {
        return view('livewire.auth.error');
    }
});
