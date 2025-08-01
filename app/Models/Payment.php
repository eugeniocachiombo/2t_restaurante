<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        "reference_code",
        "order_id",
        "user_id",
        "status",
    ];
}
