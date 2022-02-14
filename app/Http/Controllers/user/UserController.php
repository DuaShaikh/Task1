<?php

/**
 * User Controller Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\OrderItemService;
use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Http\Requests\user\AddressRequest;

    /**
     * This is UserController extends controller
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */

class UserController extends Controller
{
    protected $userService;
    protected $orderItemService;

    /**
     * Define construct function.
     *
     * @param object $userService      connecting to user service
     * @param object $orderItemService connecting to order item service
     */
    public function __construct(
        UserService $userService,
        OrderItemService $orderItemService
    ) {
        $this->userService      = $userService;
        $this->orderItemService = $orderItemService;
    }

    /**
     * This is a postUser function which register users into user table
     *
     * @param \App\Http\Requests\user\UserRequest $request passing user validation
     *
     * @return \Illuminate\View\View
     */
    public function postUser(UserRequest $request)
    {
        $users = $this->userService->registerUser($request);
        return view('user.address', compact('users'));
    }

    /**
     * This is a updateDetail function which add address id to users into user table
     *
     * @param \App\Http\Requests\user\AddressRequest $req passing address validation
     *
     * @return \Illuminate\View\View
     */
    public function updateDetail(AddressRequest $req)
    {
        $users = $this->userService->updateUserdetails($req);
        return view('shop.checkout', compact('users'));
    }

    /**
     * This is a getUserItems function which get order items that user has ordered
     *
     * @return \Illuminate\View\View
     */
    public function getUserItems()
    {
        $users = $this->orderItemService->getUserOrders();
        return view('user.orders', compact('users'));
    }
}
