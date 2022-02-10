<?php

namespace App\Models\shop;

use App\Models\shop\Product;
use App\Models\shop\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    public function productDiscount(): HasOne
    {
        return $this->hasOne(Product::class, 'discount_id', 'App\Models\Product');
    }

    public function orderDiscount(): HasOne
    {
        return $this
                ->hasOne(OrderItem::class, 'discount_id', 'App\Models\Order_item');
    }
}
