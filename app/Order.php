<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'no','user_id','payment_status','transaction_id','order_status','deliveryType','address','total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
