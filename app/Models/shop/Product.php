<?php

namespace App\Models\shop;

use App\Models\common\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
       'pName',
       'description',
       'productPrice',
       'media_id',
    ];

    protected $guarded = ['token'];
    use HasFactory;

    public function productMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
    
    function productCategory()
    {
        return $this->belongsToMany(
            Category::class, 'Product_Category', 'product_id', 'category_id'
        );
    }
}
