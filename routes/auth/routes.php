<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Http\Middleware\OnlyUserNotLoged;
use App\Livewire\Auth\Error;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Signup;
use App\Livewire\Home\Help;
use App\Livewire\Home\Index;
use App\Livewire\Home\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name("index")->middleware(OnlyUserNotLoged::class);
Route::get('/painel-principal', Main::class)->name('homepage')->middleware(OnlyUserLoged::class);
Route::get('/autenticação', Login::class)->name('auth.login')->middleware(OnlyUserNotLoged::class);
Route::get('/criar-conta', Signup::class)->name('auth.signup')->middleware(OnlyUserNotLoged::class);
Route::get('/ajuda', Help::class)->name('auth.help')->middleware(OnlyUserLoged::class);
Route::get('/terminar-sessão', Logout::class)->name('auth.logout')->middleware(OnlyUserLoged::class);
Route::fallback(Error::class);
