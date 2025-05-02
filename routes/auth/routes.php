<?php

use App\Livewire\Auth\Error;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Signup;
use App\Livewire\Home\Index;
use App\Livewire\Home\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);
Route::get('/página-inicial', Main::class)->name('homepage');
Route::get('/autenticação', Login::class)->name('auth.login');
Route::get('/cadastro', Signup::class)->name('auth.signup');
Route::fallback(Error::class);
