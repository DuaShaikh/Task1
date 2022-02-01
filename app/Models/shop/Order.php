<?php

namespace App\Models\shop;

use App\Models\User;
use App\Models\shop\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $guarded = ['token'];

    // function orderProduct()
    // {
    //     return $this
    //             ->belongsToMany(
    //                 Product::class, 
    //                 'Order_item', 'order_id', 'product_id'
    //             );
    // }
    
    function userOrder()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
