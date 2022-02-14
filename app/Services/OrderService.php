<?php

/**
 * Order service Doc Comment
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

use App\Models\User;
use App\Models\shop\Order;
use Illuminate\Http\Request;

    /**
     * This is a Order service class
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class OrderService
{
    /**
     * Create orders of user
     *
     * @param $request passing data
     *
     * @return Order
     */
    public function order($request)
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
