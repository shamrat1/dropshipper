<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bussiness extends Model
{
    protected $table = "businesses";
    protected $fillable = [
        'name',
        'user_id',
        'address',
        'description',
        'opening_hours',
        'doesShip',
        'max_delivery_time',
        'delivery_area_id',
        'mobile',
        'lat',
        'lon'
    ];

    public function products()
    {
        return $this->morphMany(Product::class, 'productable');
    }
    public function image()
    {
        return $this->morphOne(SiteImage::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
