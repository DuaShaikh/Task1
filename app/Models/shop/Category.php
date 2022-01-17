<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function CategoryProduct(){
        return $this->belongsToMany(Product::class,'Product_category','category_id','product_id');
    }
}
