<?php

/**
 * Order Item Controller Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\shop;

use App\Services\Service;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\MailService;
use App\Services\StockService;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;

    /**
     * This is OrderItemController extends controller
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class OrderItemController extends Controller
{
    protected $orderItemService;
    protected $stockService;
    protected $cartService;
    protected $mailService;


    /**
     * Define construct function.
     *
     * @param object $orderItemService connecting to orderItem service
     * @param object $cartService      connecting to cart service
     * @param object $mailService      connecting to mail service
     * @param object $stockService     connecting to stock service
     */
    public function __construct(
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


    /**
     * This is a orderItem function
     * which create orderitems,
     * get order items from order item table,
     * decrease ordered product's stock quantity from stock table,
     * after ordered delete cart items from cart table, and send mail to user
     *
     * @param \Illuminate\Http\Request $request get post req data
     * @param $id      passing id to get order items
     *
     * @return \Illuminate\View\View
     */
    public function orderItem(Request $request, $id)
    {
        // ddd($request->all());
        $order_items = $this->orderItemService->orderItems($request);
        $orders      = $this->orderItemService->getOrderItems($id);
        $stocks      = $this->stockService->decreaseStockQuantity($orders);
        $carts       = $this->cartService->deleteCartUser();
        $mail        = $this->mailService->sendMail($orders);

        return view('shop.email-verify', compact('order_items'));
    }
}
