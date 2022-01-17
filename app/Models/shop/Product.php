<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function ProductCategory(){
        return $this->belongsToMany(Category::class,'Product_category','product_id','category_id');
    }

}
