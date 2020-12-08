<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SiteImage;
use App\SubCategory;

class Category extends Model
{
    protected $fillable = [
        'name','description'
    ];

    public function image()
    {
        return $this->morphOne(SiteImage::class, 'imageable');
    }

    public function subcategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

   

}
