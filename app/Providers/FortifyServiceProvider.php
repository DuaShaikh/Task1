<?php

/**
 * FortifyServiceProvider Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

/**
 * This is FortifyServiceProvider class extends ServiceProvider
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(
            UpdateUserProfileInformation::class
        );
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::registerView(
            function () {
                return view('auth.register');
            }
        );

        RateLimiter::for(
            'login',
            function (Request $request) {
                $email = (string) $request->email;

                return Limit::perMinute(5)->by($email . $request->ip());
            }
        );

        RateLimiter::for(
            'two-factor',
            function (Request $request) {
                return Limit::perMinute(5)->by($request->session()->get('login.id'));
            }
        );
    }
}
