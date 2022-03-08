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
     * @return user
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
        $user= User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        return $user;
    }

    public function getUserbyId($id)
    {
        $user = User::find($id);
        $user->get();
        return $user;

    }

    public function getAllUsersExceptCurrent($id)
    {
        // $user = User::when($req->search, function($query, $search) {
        //     return $query->where('name', 'LIKE', "%$search%");
        // })->latest();
        // $user->except($id);
        $user = User::all()->except($id);
        // $user->get();
        return $user;

    }
}
