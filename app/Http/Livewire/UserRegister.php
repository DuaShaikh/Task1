<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class UserRegister extends Component
{
    public $fullName, $email, $password, $password_confirmation, $gender, $phone;

    public $users;

    public function render()
    {
        return view('livewire.user-register');
    }

    public function registerUser()
    {
        $this->validate(
            [ 
                'fullName' => "required|max:30|not_regex:/[0-9]/",
                'password' => [
                                'required', 'string','confirmed',
                                Password::min(8)->mixedCase()
                                    ->letters()->numbers()->symbols()
                              ],
                'email' => 'required|email|unique:users',
                'phone' => 'required|regex:/(03)[0-9]{9}/|not_regex:/[a-z]/|min:11',
            ]
        ); 
        
        $this->users = User::create(
            [
                'fullName' => $this->fullName,
                'email'    => $this->email,
                'password' => Hash::make($this->password),
                'gender'   => $this->gender,
                'phone'    => $this->phone
            ]
        );

        //  dd($this->users->id);
        return redirect('/address');

        // return view('user.address', ['users' => $this->users]);
    }
}
