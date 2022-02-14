<?php

/**
 * Authenticate Middleware Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * This is Authenticate class extends Middleware
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request passing data
     *
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
