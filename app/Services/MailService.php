<?php

/**
 * Mail service Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

    /**
     * This is a Mail service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class MailService
{
    /**
     * Send mail to user on every order purchased
     * 
     * @param $orders passing user ordered data
     * 
     * @return void
     */
    public function sendMail($orders)
    {
        $data = ['user' => auth()->user()->fullName, 'orders' => $orders];
        $user['to'] = auth()->user()->email;
        return Mail::send(
            'shop.mail',
            $data,
            function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Order Confirmation Email');
            }
        );
    }
}
