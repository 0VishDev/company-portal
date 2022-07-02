<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';
    
    public function state(){
        return $this->belongsTo('ZigKart\Models\State', 'state_id', 'id');   
    }
    
    public function city(){
        return $this->belongsTo('ZigKart\Models\City', 'city_id', 'id');   
    }
}
