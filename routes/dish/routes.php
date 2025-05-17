<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\Dish\DishComponent;
use Illuminate\Support\Facades\Route;

Route::get('/pratos', DishComponent::class)->name('dish.component')->middleware(OnlyUserLoged::class);
