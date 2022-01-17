<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    function OrderProduct(){
     
            return $this->belongsToMany(Product::class, 'Order_item', 'order_id', 'product_id');
        }
}
