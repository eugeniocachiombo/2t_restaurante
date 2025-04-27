<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeItem extends Model
{
    protected $fillable = [
        "description",
        "quantity",
        "recipe_id",
        "ingredient_id",
    ];
}
