<?php

namespace ZigKart\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class SellerInquiry extends Model
{
  protected $table = 'seller_inquiry';
  
  public function user()
  {
    return $this->belongsTo('ZigKart\User', 'user_id', 'id');
  }
}
