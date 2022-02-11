<?php

/**
 * User service Doc Comment
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
use App\Models\user\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

    /**
     * This is a User service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class UserService
{
    /**
     * Register authorized user 
     * 
     * @param Illuminate\Http\Request $request 
     * 
     * @return user
     */
    function registerUser($request)
    {
        // return User::create($request->all());
        return User::create(
            [
                'fullName' => $request['fullName'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'gender' => $request['gender'],
                'phone' => $request['phone'],
                'address_id' => $request['address_id'],
                'media_id' => $request['media_id']
            ]
        );
    }

    /**
     * Adding media id and address id
     * 
     * @param Illuminate\Http\Request $req passing requested data
     * 
     * @return User
     */
    function updateUser($req)
    {
        $user = User::find($req["id"]);

        $user->update($req);

        return $user;
    }

    /**
     * Get user details of logged in user
     * 
     * @return User
     */
    function getUserdetails()
    {
        $userID = auth()->user()->id;

        return User::where('id', $userID)->with('userAddress')->get();
    }
    /**
     * Update all logged in user detail 
     * 
     * @param Illuminate\Http\Request $req passing requested data
     * 
     * @return User
     */
    function updateUserdetails($req)
    {
        $user = auth()->user();

        $address = Address::find($req->id);

        $address->update($req->all());

        $req->merge(
            [
                'address_id' => $req->id,
            ]
        );

        $user->update($req->all());

        return $user;
    }
}
