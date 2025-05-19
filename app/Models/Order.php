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

    public function items()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }

    public function attendant()
    {
        return $this->belongsTo(User::class, 'attendant_user_id');
    }

}
