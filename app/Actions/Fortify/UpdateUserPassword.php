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
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

/**
 * UpdateUserPassword class implements UpdatesUserPasswords
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param mixed $user  passing data
     * @param array $input passing data
     *
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make(
            $input,
            [
                'current_password' => ['required', 'string'],
                'password' => $this->passwordRules(),
            ]
        )->after(
            function ($validator) use ($user, $input) {
                if (!isset($input['current_password']) || ! Hash::check(
                    $input['current_password'],
                    $user->password
                )
                ) {
                    $validator->errors()
                        ->add(
                            'current_password',
                            __(
                                'The provided password does not 
                                match your current password.'
                            )
                        );
                }
            }
        )->validateWithBag('updatePassword');

        $user->forceFill(
            [
                'password' => Hash::make($input['password']),
            ]
        )->save();
    }
}
