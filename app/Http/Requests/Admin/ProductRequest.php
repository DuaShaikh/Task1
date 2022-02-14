<?php

/**
 * FormRequest Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ProductRequest extends FormRequest  Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class ProductRequest extends FormRequest
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
            'pName'        => "required|min:4|max:100",
            'description'  => "required|min:10|max:1000",
            'productPrice' => "required|not_regex:/[a-z, A-Z]/|min:3",
            'photo'        => "required|image|mimes:jpeg,png,jpg|max:2048",
            'category_id'  => "required",
            // 'quantity'     => "required|not_regex:/[a-z, A-Z]/",
            // 'size'         => "required"

        ];
    }
}
