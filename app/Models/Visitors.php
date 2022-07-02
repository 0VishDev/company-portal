<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $table = 'visitors';
    
    public function user()
    {
        return $this->belongsTo('ZigKart\User', 'user_id', 'id');
    }
}
