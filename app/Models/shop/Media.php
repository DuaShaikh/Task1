<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public function ProductImage(): HasOne
    {
        return $this->hasMany(Product::class, 'media_id', 'App\Models\Product');
    }

    public function CategoryImage(): HasOne
    {
        return $this->hasMany(Category::class, 'media_id', 'App\Models\Category');
    }

    public function OrderImage(): HasOne
    {
        return $this->hasMany(Order::class, 'media_id', 'App\Models\Order');
    }
}

