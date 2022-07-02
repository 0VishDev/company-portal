<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    protected $table = 'product_inquiry';
    
    public function product() {
        return $this->belongsTo('ZigKart\Models\Product', 'product_id', 'product_id');
    }
    
    public function user() {
        return $this->belongsTo('ZigKart\User', 'user_id', 'id');
    }
    
    
    public function scopeLeadDesk($query, $userId)
    {
        return $query->whereHas('inquiry_seller_desk', function($q) use ($userId){
				$q->where('user_id', $userId);
			});
    }
    
    public function inquiry_sellers()
	{
		return $this->hasMany('ZigKart\Models\ProductInquirySellers', 'product_inquiry_id', 'inquiry_id');
	}
    
    public function inquiry_seller_desk()
	{
		return $this->hasOne('ZigKart\Models\ProductInquirySellers', 'product_inquiry_id', 'inquiry_id')->where('is_buy_lead', 0);
	}
    
    public function inquiry_seller()
	{
		return $this->hasOne('ZigKart\Models\ProductInquirySellers', 'product_inquiry_id', 'inquiry_id')->where('user_id', \Auth::user()->id)->where('is_buy_lead', 0);
	}
	
	public function consumed_inquiry_seller()
	{
		return $this->hasOne('ZigKart\Models\ProductInquirySellers', 'product_inquiry_id', 'inquiry_id')->where('user_id', \Auth::user()->id)->where('is_buy_lead', 0)->where('is_consumed', 1);
	}
	
	public function buy_inquiry_seller()
	{
		return $this->hasOne('ZigKart\Models\ProductInquirySellers', 'product_inquiry_id', 'inquiry_id')->where('user_id', \Auth::user()->id)->where('is_buy_lead', 1);
	}
	
	
	public function shortlist_inquiry_seller()
	{
		return $this->hasOne('ZigKart\Models\ProductInquirySellers', 'product_inquiry_id', 'inquiry_id')->where('user_id', \Auth::user()->id)->where('is_buy_lead', 1)->where('is_shortlist', 1);
	}
}
