<?php

/**
 * Widget service Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravelbackend.me/
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

    /**
     * This is a Widget service class
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravelbackend.me/
     */
class UserService
{
    /**
     * Get widget data from widget table
     *
     * @return Widget
     */
    public function getUsers()
    {
        return User::all();
    }

    public function postUsers($request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'phone' => $request['phone'],
        ]);
    }

    public function loginStore($request)
    {        
        return User::where( [
            'email' => $request->email,
            'password' => $request->password
        ])->first();
         
        // return auth()->attempt($data);
        // if (auth()->attempt($data)) {
        //     $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
        //     return response()->json(['token' => $token], 200);
        // } else {
        //     return response()->json(['error' => 'Unauthorised'], 401);
        // }
    }
}
