<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/utilizador/perfil', Profile::class)->name('user.profile')->middleware(OnlyUserLoged::class);
