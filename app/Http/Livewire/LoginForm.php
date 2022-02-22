<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;


class LoginForm extends Component
{
    // public $email, $password;
    public $form= [
        'email'    => '',
        'password' => ''
    ];
    
    public function render()
    {
        return view('livewire.login-form');
    }

    public function handleGoogleCallback()
    {
        $providerUser = Socialite::driver('google')->stateless()->user();

        $this-> loginOrRegister($providerUser);

        return redirect('/');
    }

    public function handleFacebookCallback ()
    {
        $providerUser = Socialite::driver('facebook')->user();

        $this->loginOrRegister($providerUser);

        return redirect('/');
    }

    public function loginOrRegister($providerUser)
    {     
        $user = User::where('provider_id', $providerUser->id)->first();

        if (!$user) {
            $user = User::create([
                'fullName'    => $providerUser->name,
                'email'       => $providerUser->email,
                'provider_id' => $providerUser->id,
                'remember_token' => $providerUser->token,
            ]);
        }
     
        Auth::login($user);
     
        // return redirect('/');
    }
    
    // public function login(LoginRequest $form)
    // {
    //     $form->authenticate();

    //     $form->session()->regenerate();

    //     return Redirect::intended();
    // }
    // public function loginUser()
    // {
    //     $this->validate(
    //         [
    //             'email' => ['required', 'string', 'email'],
    //             'password' => ['required', 'string'],
    //         ]
    //     );
        
    //     if(Auth::attempt(array('email' => $this->email, 'password' => $this->password), $this->remember_me)){
    //             session()->flash('message', "You are Login successful.");
    //             return Redirect::intended();
    //     }else{
    //         session()->flash('error', 'email and password are wrong.');
    //     }
    // }

}
