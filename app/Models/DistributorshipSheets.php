<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;

class DistributorshipSheets extends Model
{
    protected $table = 'distributorship_sheets';
    
    public function products(){
        return $this->hasMany('ZigKart\Models\DistributorshipSheetProducts', 'id', 'distributorship_sheet_id');
    }
}
