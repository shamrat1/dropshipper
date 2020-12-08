<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductExtraFeatures extends Model
{
    protected $fillable = [
        'product_id', 'size', 'color', 'quantity'
    ];
}
