<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = [
        "description",
        "price",
        "expiration_date",
        "photo",
        "status",
        "user_id",
    ];
}
