<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    protected $fillable = [
        'user_id',
        'card_name',
        'card_no',
        'expiry_date',
        'cvc'
    ];
}
