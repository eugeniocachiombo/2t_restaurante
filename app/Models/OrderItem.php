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
}
