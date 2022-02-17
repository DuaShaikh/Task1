<?php

/**
 * Order Controller Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\UserService;
use App\Services\OrderService;
use App\Services\StockService;
use App\Http\Controllers\Controller;

    /**
     * This is OrderController extends controller
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class OrderController extends Controller
{
    protected $orderService;
    protected $cartService;
    protected $stockService;
    protected $userService;

    /**
     * Define construct function.
     *
     * @param object $orderService connecting to order service
     * @param object $cartService  connecting to cart service
     * @param object $stockService connecting to stock service
     * @param object $userService  connecting to user service
     */
    public function __construct(
        OrderService $orderService,
        CartService $cartService,
        StockService $stockService,
        UserService $userService,
    ) {
        $this->orderService = $orderService;
        $this->cartService  = $cartService;
        $this->stockService = $stockService;
        $this->userService = $userService;
    }

    /**
     * This is a postOrder function which update user details,
     * post orders and get updated cart items
     *
     * @param \Illuminate\Http\Request $request get post req data
     *
     * @return \Illuminate\View\View
     */
    public function postOrder(Request $request)
    {
        $users = $this->userService->updateUserdetails($request);
        $orders = $this->orderService->order($request);
        $carts  = $this->cartService->getUpdateCarts();

        return view('shop.order-detail', compact('carts', 'orders'));
    }
}
