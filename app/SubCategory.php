<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id', 'name'
    ];

    public function image()
    {
        return $this->morphOne(SiteImage::class, 'imageable');
    }

    function subCategory__relationTo__category(){
      return $this->hasOne('App\Category', 'id', 'category_id');
      // N:B: hasOne('Destination model', 'Destination model id(primary key)', 'to this model foreign key');      
   }

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function Product(){
        return $this->hasMany(Product::class,'sub_category_id');
    }
   
}
