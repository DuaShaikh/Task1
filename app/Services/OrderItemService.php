<?php

/**
 * Order Item service Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Shop\OrderItem;

    /**
     * This is a Order item service class
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class OrderItemService
{
    /**
     * User purchased order items
     *
     * @param $request passing data
     *
     * @return orderItem
     */
    public function orderItems($request)
    {
        $data = $request->orders;
        return OrderItem::insert($data);
    }

    /**
     * Get all ordered items by order id
     *
     * @param $id passing order id
     *
     * @return orderItem
     */
    public function getOrderItems($id)
    {
        return OrderItem::where('order_id', $id)->get();
    }

    /**
     * Get user's ordered items by id
     *
     * @return OrderItem
     */
    public function getUserOrders()
    {
        return auth()->user()->order()
            ->with('items.orderProduct')
            ->orderByDesc('id')->get();
    }
}
