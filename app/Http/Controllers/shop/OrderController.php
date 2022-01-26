<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\OrderService;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    protected $orderService;
    protected $cartService;
    
    function __construct(OrderService $orderService, CartService $cartService) 
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    function postOrderItem(Request $request)
    {
        $orders = $this->orderService->order($request);
        $carts  = $this->cartService->getUpdateCarts();
        return view('shop.order-detail', compact('carts'));
    }
}
