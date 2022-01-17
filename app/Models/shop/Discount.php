<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public function ProductDiscount(): HasOne
    {
        return $this->hasOne(Product::class, 'discount_id', 'App\Models\Product');
    }

    public function OrderDiscount(): HasOne
    {
        return $this->hasOne(Order_item::class, 'discount_id', 'App\Models\Order_item');
    }
}
