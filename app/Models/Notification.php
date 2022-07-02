<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table = "notification";

    protected $fillable = [
        "vendor_id", "user_id", "product_id", "quantity", "unit", "order_value", "payment_method", "description", 
    ];
}
