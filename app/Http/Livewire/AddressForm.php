<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\User\Address;

class AddressForm extends Component
{
    public $form = [
        'address'    => '',
        'city'       => '',
        'region'     => '',
        'country'    => '',
        'postalCode' => ''
    ];

    public $users;

    public function render()
    {
        return view('livewire.address-form');
    }

    public function address()
    {
        $this->validate(
            [
                'form.address'    => 'required',
                'form.city'       => 'required',
                'form.region'     => 'required',
                'form.country'    => 'required',
                'form.postalCode' => 'required'
            ]
        );

        $address = Address::create($this->form);

        $id = User::max('id');
        $user = User::find($id);
        $user->update(["address_id" => $address->id]);
    
        return redirect('/media');
    }

}
