<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        "description",
        "category_id",
        "unit",
        "user_id",
    ];

    public function getUser(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function getCategories(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
