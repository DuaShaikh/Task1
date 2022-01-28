<?php

namespace App\Services;
use App\Models\shop\Order_Item;
use Illuminate\Http\Request;

class OrderItemService
{

    function orderItems($request) 
    {
        $data = $request->orders;
        return Order_Item::insert($data);
    }
    
    function getOrderItems($id)
    {
        return order_Item::where('order_id', $id)->get();
    }
}