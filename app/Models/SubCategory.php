<?php

namespace ZigKart\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class SubCategory extends Model
{
    
	/* category */
	
	protected $table = 'subcategory';
	
  
  
   public function Category(){
      return $this->belongsTo('ZigKart\Models\Category', 'cat_id', 'cat_id');
   }
   
   public function products() {
      $result =  DB::table('product')->where('product_category', 'like', '%subcat-' . $this->subcat_id)->where('product.product_drop_status','=','no')->get();
      return Product::hydrate($result->toArray());
   }
  
}
