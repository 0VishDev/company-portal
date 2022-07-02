<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    protected $table = 'lead';

    protected $fillable = [
        'product_name', 'requirement', 'email', 'mobile_no', 'is_verified', 'is_posted'
    ];

}
