<?php

namespace ZigKart\Models;
use Illuminate\Database\Eloquent\Model;

class PackageTags extends Model
{
    protected $table = 'package_tags';
    
    // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];

	protected $guarded = array('id');
	
	public function service_provider()
    {
        return $this->belongsTo('ZigKart\Models\ServiceProviders', 'service_provider_id', 'id');
    }
      
    public function user()
    {
        return $this->belongsTo('ZigKart\User', 'user_id', 'id');
    }
}
