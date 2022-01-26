<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'address_id',
        'user_id',
        'price',
    ];

    protected $guarded = ['token'];

    function OrderProduct(){
     
            return $this->belongsToMany(Product::class, 'Order_item', 'order_id', 'product_id');
        }


}
