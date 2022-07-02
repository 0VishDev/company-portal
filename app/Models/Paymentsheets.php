<?php

namespace ZigKart\Models;
use Illuminate\Database\Eloquent\Model;

class Paymentsheets extends Model
{
    protected $table = 'paymentsheets';
    
    public function payments()
    {
        return $this->hasMany('ZigKart\Models\PaymentsheetPayments', 'paymentsheet_id', 'id');
    }
}
