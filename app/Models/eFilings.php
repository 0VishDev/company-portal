<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class eFilings extends Model
{
    protected $table = 'e_filings';
    
    public function state(){
        return $this->belongsTo('ZigKart\Models\State', 'state_id', 'id');   
    }
    
    public function city(){
        return $this->belongsTo('ZigKart\Models\City', 'city_id', 'id');   
    }
}
