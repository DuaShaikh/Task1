<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\UserService;
use App\Services\OrderService;
use App\Services\StockService;
use App\Services\ProductService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $orderService;
    protected $cartService;
    protected $stockService;
    protected $userService;

    function __construct(
        OrderService $orderService,
        CartService $cartService,
        StockService $stockService,
        UserService $userService,
        ProductService $productService
    ) {
        $this->orderService = $orderService;
        $this->cartService  = $cartService;
        $this->stockService = $stockService;
        $this->userService = $userService;
        $this->productService = $productService;
    }

    function postOrder(Request $request)
    {
        $users = $this->userService->updateUserdetails($request);
        $orders = $this->orderService->order($request);
        $carts  = $this->cartService->getUpdateCarts();
        // $products = $this->productService->decreaseStockQuantity();

        // ddd($stocks);
        return view('shop.order-detail', compact('carts', 'orders'));
    }
}
