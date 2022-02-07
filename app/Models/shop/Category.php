<?php

namespace App\Models\shop;

use App\Models\common\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = [
        'categoryName',
        'media_id',
        'parent_id'
    ];

    protected $guarded = ['token'];
    use HasFactory;

    public function categoryMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

}
