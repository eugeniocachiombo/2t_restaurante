<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "description",
        "user_id"
    ];

    public function getUser(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
