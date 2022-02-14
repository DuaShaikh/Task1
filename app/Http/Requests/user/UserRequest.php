<?php

/**
 * Form Request Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * UserRequest extends FormRequest  Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullName' => "required|max:15|not_regex:/[0-9]/",
            'password' => [
                            'required', 'string','confirmed',
                            Password::min(8)->mixedCase()
                                ->letters()->numbers()->symbols()
                          ],
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/(03)[0-9]{9}/|not_regex:/[a-z]/|min:11',

        ];
    }
}
