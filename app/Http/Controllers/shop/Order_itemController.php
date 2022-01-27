<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\MailService;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;

class Order_ItemController extends Controller
{
    protected $orderItemService;
    protected $cartService;

    function __construct(OrderItemService $orderItemService, CartService $cartService, MailService $mailService ) 
    {
        $this->orderItemService = $orderItemService;
        $this->cartService = $cartService;
        $this->mailService = $mailService;
    }

    function order_item(Request $request)
    {
          $order_items = $this->orderItemService->order_items($request);
          $orders      = $this->orderItemService->getOrderItems();
          $carts       = $this->cartService->deleteCartUser();
          $mail        = $this->mailService->sendMail($orders);
          return view('shop.email-verify',compact('order_items'));
    }

}
