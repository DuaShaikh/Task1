<?php

/**
 * AddressController Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\AddressService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddressRequest;

/**
 * Address Controller extends controller  Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class AddressController extends Controller
{
    protected $addressService;
    protected $userService;

    /**
     * Define construct function.
     *
     * @param object $addressService connecting to address service
     * @param object $userService    connecting to user service
     */
    public function __construct(
        AddressService $addressService,
        UserService $userService
    ) {
        $this->addressService = $addressService;
        $this->userService = $userService;
    }

    /**
     * This is a saveAddress function which save address of users into address table
     *
     * @param \App\Http\Requests\user\AddressRequest $request passing requested data
     *
     * @return \Illuminate\View\View
     */
    public function saveAddress(AddressRequest $request)
    {
        $address = $this->addressService->userAddress($request);
        $users = $this->userService
            ->updateUser(["id" => $request->user_id, "address_id" => $address->id]);

        return view('common.media', compact('users'));
    }
}
