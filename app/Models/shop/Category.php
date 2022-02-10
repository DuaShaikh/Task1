<?php

namespace App\Models\shop;

use App\Models\common\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
        'media_id',
        'parent_id'
    ];

    protected $guarded = ['token'];


    public function categoryMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
