<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\MailService;
use App\Services\StockService;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;

class Order_ItemController extends Controller
{
    protected $orderItemService;
    protected $sockService;
    protected $cartService;
    protected $mailService;

    function __construct(OrderItemService $orderItemService, CartService $cartService, MailService $mailService,StockService $stockService ) 
    {
        $this->orderItemService = $orderItemService;
        $this->cartService = $cartService;
        $this->mailService = $mailService;
        $this->stockService = $stockService;
    }
    
    function order_item(Request $request, $id)
    {
          $order_items = $this->orderItemService->orderItems($request);
          $orders      = $this->orderItemService->getOrderItems($id);
          // $stocks      = $this->stockService->updateStock($orders);
          $carts       = $this->cartService->deleteCartUser();
          $mail        = $this->mailService->sendMail($orders);
          return view('shop.email-verify', compact('order_items'));
    }

}
