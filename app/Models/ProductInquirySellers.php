<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInquirySellers extends Model
{
    protected $table = 'product_inquiry_sellers';
    
    public function user()
    {
        return $this->belongsTo('ZigKart\User', 'user_id', 'id');
    }
}
