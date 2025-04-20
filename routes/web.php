<?php

use App\Livewire\Auth\Error;
use App\Livewire\Auth\Login;
use App\Livewire\Home\Index;
use App\Livewire\Home\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);
Route::get('/home', Main::class);
Route::get('/login', Login::class);
Route::fallback(Error::class);
