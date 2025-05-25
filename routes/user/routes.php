<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\User\AttendentComponent;
use App\Livewire\User\CookerComponent;
use App\Livewire\User\CostumerComponent;
use App\Livewire\User\Profile;
use App\Livewire\User\SupervisorComponent;
use Illuminate\Support\Facades\Route;

Route::get('/utilizador/perfil', Profile::class)->name('user.profile')->middleware(OnlyUserLoged::class);
Route::get('/utilizador/clientes', CostumerComponent::class)->name('user.custumer')->middleware(OnlyUserLoged::class);
Route::get('/utilizador/supervisor', SupervisorComponent::class)->name('user.supervisor')->middleware(OnlyUserLoged::class);
Route::get('/utilizador/atendente', AttendentComponent::class)->name('user.attendent')->middleware(OnlyUserLoged::class);
Route::get('/utilizador/cozinheiro', CookerComponent::class)->name('user.cooker')->middleware(OnlyUserLoged::class);
