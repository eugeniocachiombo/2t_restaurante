<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = [
        "description",
        "price",
        "quantity",
        "expiration_date",
        "photo",
        "status",
        "user_id",
    ];

    public function getUser(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
