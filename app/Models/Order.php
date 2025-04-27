<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "description",
        "number",
        "customer_user_id",
        "attendant_user_id",
        "type",
        "status",
        "total_price",
        "total_quantity",
        "total_discount",
    ];
}
