<?php

namespace App\Services;
use App\Models\shop\Order;
use Illuminate\Http\Request;
use App\Models\shop\Order_Item;

class OrderItemService
{

    function orderItems($request) 
    {
        $data = $request->orders;
        return Order_Item::insert($data);
    }
    
    function getOrderItems($id)
    {
        return Order_Item::where('order_id', $id)->get();
    }

    function getUserOrders()
    {
        return auth()->user()->order()->with('items.orderProduct')->get();
        $userOrder = Order::where('user_id', $id)->get();
        foreach ($userOrder as $key => $order) {
            // ddd($key);
        $order = Order_Item::where('order_id', $userOrder[$key]['id'])->get();
        $user = Order_Item::get();
        // ddd($order);
        }
        
        return $order;
    }
}

