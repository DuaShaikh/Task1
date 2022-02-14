<?php

/**
 * Fortify validator Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

/**
 * This is ResetUserPassword class implements ResetsUserPasswords
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param mixed $user  passing data
     * @param array $input passing data
     *
     * @return void
     */
    public function reset($user, array $input)
    {
        Validator::make(
            $input,
            [
                'password' => $this->passwordRules(),
            ]
        )->validate();

        $user->forceFill(
            [
                'password' => Hash::make($input['password']),
            ]
        )->save();
    }
}
