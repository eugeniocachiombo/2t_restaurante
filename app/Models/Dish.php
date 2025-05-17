<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        "description",
        "photo",
        "status",
        "recipe_id",
        "user_id",
        "quantity",
        "price",
        "discount",
    ];

    public function getUser(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
