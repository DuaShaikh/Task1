<?php

namespace App\Models\shop;

use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Item extends Model
{
    protected $fillable = [
        'order_id',
        'quantity',
        'productPrice',
        'product_id',
    ];

    protected $guarded = ['token'];
    use HasFactory;

    function orderProduct() 
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    function orders()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
