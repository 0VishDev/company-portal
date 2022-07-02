<?php

namespace ZigKart;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ZigKart\Models\ProductInquiry;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
	const ADMIN_TYPE = 'admin';
    
	
	
	public function isAdmin()    {        
		return $this->user_type === self::ADMIN_TYPE;    
	} 
	 
	 
	 
    protected $fillable = [
        'name', 'email', 'password', 'username', 'user_token', 'earnings', 'user_type', 'provider', 'provider_id', 'verified', 'user_subscr_type', 'user_subscr_price', 'user_subscr_date', 'user_subscr_causes',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function products(){
        return $this->hasMany('ZigKart\Models\Product', 'user_id', 'id')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no');   
    }
    
    public function country(){
        return $this->belongsTo('ZigKart\Models\Country', 'country_id', 'country_id');   
    }
    
    public function state(){
        return $this->belongsTo('ZigKart\Models\State', 'state_id', 'id');   
    }
    
    public function city(){
        return $this->belongsTo('ZigKart\Models\City', 'city_id', 'id');   
    }
    
    public function getUserTypeFormattedAttribute()
    {
        if ($this->user_type == "admin"){
            return "Admin";
        }
        else if ($this->user_type == "vendor"){
            return "Seller";
        }
        else if ($this->user_type == "customer"){
            return "Buyer";
        }
		else{
            return "Unknown";
		}
    }
    
    public function package_tags(){
        return $this->hasMany('ZigKart\Models\PackageTags', 'user_id', 'id');   
    }
    
    public function package_tag(){
        return $this->belongsTo('ZigKart\Models\PackageTags', 'id', 'user_id');   
    }
    
    public function leadDesk(){
        $productInquiry = ProductInquiry::leadDesk($this->id)->where('is_send_to_seller', 1)->with('product')->orderBy('created_at', 'desc')->get();
        
        return $productInquiry;
    }
    
    public function productInquiry(){
        $productInquiry = ProductInquiry::where('user_id', $this->id)->orderBy('created_at', 'desc')->get();
        
        return $productInquiry;
    }
}
