<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sub_category_id',
        'title',
        'price',
        'product_code',
        'total_product',
        'slug',
        'isPublished',
        'description'
    ];
    public function business()
    {
        return $this->belongsTo(Bussiness::class,'productable_id');
    }
    public function productable()
    {
        return $this->morphTo();
    }
    public function images()
    {
        return $this->morphMany(SiteImage::class, 'imageable');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
