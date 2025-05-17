<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEnter extends Model
{
    protected $fillable = [
        "drink_id",
        "dish_id",
        "quantity",
        "expiration_date",
        "user_id",
    ];

    public function getDrink(){
        return $this->belongsTo(Drink::class, "drink_id", "id");
    }
    public function getUser(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
