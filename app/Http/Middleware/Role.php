<?php

/**
 * Role Middleware Doc Comment
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

use Closure;
use Illuminate\Http\Request;

/**
 * This is Role class
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request              $request passing data
     * @param \Closure(\Illuminate\Http\Request): (
     *        \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $config = config('auth.admin');
        if (auth()->user()->role == $config) {
            return $next($request);
        }
        return redirect('/dashboard')
            ->with(
                'error',
                'Permission Denied!!! You do not have administrative access.'
            );
    }
}
