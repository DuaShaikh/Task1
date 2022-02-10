<?php

namespace App\Http\Controllers\shop;

use App\Services\Service;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\MailService;
use App\Services\StockService;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;

class OrderItemController extends Controller
{
    protected $orderItemService;
    protected $stockService;
    protected $cartService;
    protected $mailService;

    function __construct(
        OrderItemService $orderItemService,
        CartService $cartService,
        MailService $mailService,
        StockService $stockService
    ) {
        $this->orderItemService = $orderItemService;
        $this->cartService = $cartService;
        $this->mailService = $mailService;
        $this->stockService = $stockService;
    }

    function orderItem(Request $request, $id)
    {
        $order_items = $this->orderItemService->orderItems($request);
        $orders      = $this->orderItemService->getOrderItems($id);
        $stocks      = $this->stockService->decreaseStockQuantity($request, $orders);
        $carts       = $this->cartService->deleteCartUser();
        $mail        = $this->mailService->sendMail($orders);

        return view('shop.email-verify', compact('order_items'));
    }
}
