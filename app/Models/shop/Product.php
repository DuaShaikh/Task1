<?php

namespace App\Models\shop;

use App\Models\common\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    function productCategory()
    {
        return $this->belongsToMany(
            Category::class, 'Product_category', 'product_id', 'category_id'
        );
    }
    public function productMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

}
