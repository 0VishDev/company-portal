<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackRequest extends Model
{
    //
    protected $table = 'callback_request';

    protected $fillable = [
        'name', 'email', 'mobile_no'
    ];

}
