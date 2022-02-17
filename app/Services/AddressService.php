<?php

/**
 * Address service Doc Comment
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

use App\Models\User\Address;
use Illuminate\Http\Request;

    /**
     * This is a Address service class
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class AddressService
{
    /**
     * Create user address into address table
     *
     * @param $request passing data
     *
     * @return Address
     */
    public function userAddress($request)
    {
        return Address::create($request->all());
    }

    // function updateUserAddress($req)
    // {
    //     return Address::update($req->all());
    // }
}
