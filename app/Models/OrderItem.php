<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        "dish_id",
        "drink_id",
        "order_id",
        "quantity",
        "price",
    ];

    public function dish()
    {
        return $this->belongsTo(Dish::class, "dish_id", "id");
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class, "drink_id", "id");
    }

   
}
