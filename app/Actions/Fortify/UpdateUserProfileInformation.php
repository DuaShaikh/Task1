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

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

/**
 * UpdateUserProfileInformation class implements UpdatesUserProfileInformation
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
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
                'fullName' => ['required', 'string', 'max:255'],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
            ]
        )->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email
            && $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill(
                [
                    'fullName' => $input['fullName'],
                    'email' => $input['email'],
                ]
            )->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user  passing data
     * @param array $input passing data
     *
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill(
            [
                'fullName' => $input['fullName'],
                'email' => $input['email'],
                'email_verified_at' => null,
            ]
        )->save();

        $user->sendEmailVerificationNotification();
    }
}
