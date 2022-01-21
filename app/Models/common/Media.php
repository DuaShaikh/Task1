<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public function ProductImage(): HasOne
    {
        return $this->hasMany(Product::class, 'id', 'App\Models\shop\Product');
    }

    public function CategoryImage(): HasOne
    {
        return $this->hasMany(Category::class, 'id', 'App\Models\shop\Category');
    }

    public function OrderImage(): HasOne
    {
        return $this->hasMany(Order::class, 'id', 'App\Models\shop\Order');
    }

    protected $fillable = [
        'url',
        'imageName',
        'imageType'
        
    ];

    protected $guarded = ['token'];
}

