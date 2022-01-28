<?php

namespace App\Services;
use App\Models\User;
use App\Models\shop\Order;
use Illuminate\Http\Request;

class OrderService
{

    function order($request) 
    {
        $userId = auth()->user()->id;
        
        $request->merge(
            [
                "user_id" => $userId,
                // "address_id" => auth()
            ]
        );
        return Order::create($request->all());
        
    }
    
}