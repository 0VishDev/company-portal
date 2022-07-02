<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $table = 'state';

    public function cities() {
        return $this->hasMany(City::class, 'state_id', 'id');
    }

}
