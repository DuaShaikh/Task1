<?php

namespace App\Models\shop;

use App\Models\common\Media;
use App\Models\shop\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
       'pName',
       'description',
       'productPrice',
       'media_id',
    ];

    protected $guarded = ['token'];


    public function productMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
