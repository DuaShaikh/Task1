<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\StockService;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    protected $orderService;
    protected $cartService;
    protected $stockService;
    
    function __construct(OrderService $orderService, CartService $cartService, StockService $stockService) 
    {
        $this->orderService = $orderService;
        $this->cartService  = $cartService;
        $this->stockService = $stockService;

    }

    function postOrder(Request $request)
    {
        $orders = $this->orderService->order($request);
        $carts  = $this->cartService->getUpdateCarts();
        // ddd($carts);
        // $stocks = $this->stockService->updateStock($carts->product_id, $carts->size);
        // ddd($stocks);
        return view('shop.order-detail', compact('carts', 'orders'));
    }
}
