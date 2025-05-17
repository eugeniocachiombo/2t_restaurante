<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\Ingredient\IngredientComponent;
use Illuminate\Support\Facades\Route;

Route::get('/ingredientes', IngredientComponent::class)->name('ingredient.component')->middleware(OnlyUserLoged::class);
