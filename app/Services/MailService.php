<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailService
{
    function sendMail($orders)
    {
        $data = ['user'=>auth()->user()->fullName, 'orders'=>$orders];
        $user['to']= auth()->user()->email;
        return Mail::send(
            'shop.mail', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Order Confirmation Email');
            }
        );    
    }
}
