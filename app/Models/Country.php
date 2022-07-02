<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    public function state()
	{
		return $this->belongsTo('App\Models\State','id','country_id');
	}
}
