<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\Category\CategoryComponent;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', CategoryComponent::class)->name('category.component')->middleware(OnlyUserLoged::class);
