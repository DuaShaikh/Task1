<?php

namespace App\Services;
use App\Models\shop\Order_Item;
use Illuminate\Http\Request;

class OrderItemService
{

    function order_items($request) 
    {
        $data = $request->orders;
        return Order_Item::insert($data);
    }
    
    function getOrderItems()
    {
        // $order = order_item::where('order_id',$order_items->order_id);
        // ddd($order);
        // return $order->get();
        // $order_id = $order_items->order_id;
        $order = order_Item::all();
        // ddd($order);
        return $order;
    }
}