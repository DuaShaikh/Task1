<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\user\Address;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegistrationTest extends TestCase
{
  
    public function test_user_can_register_and_update_details()
    {
        $response = $this->post('/register', [
            'fullName'              => 'Test User',
            'email'                 => 'test@example.com',
            'password'              => 'Password123@',
            'password_confirmation' => 'Password123@',
            'phone'                 => '03212233187', 
            'gender'                => 'M',
        ])->assertStatus(200);

        $user = User::first();

        $response = $this->post('/address', [
            'user_id' =>  $user->id,
            'address' =>   'Karachi block-7',
            'city'    => 'Karachi',
            'region'  => 'sindh',
            'country' => 'pakistan',
            'postalCode' => '77150'
        ])->assertStatus(200);

        $address = Address::first();

        $image = Str::random(length: 8) . '.jpg';
        
        $response = $this->post('/media', [
            'user_id'    => $user->id,
            'address_id' => $address->id, 
            'imageName'  => 'profile photo',
            'photo'      => UploadedFile::fake()->image($image),
        ])->assertStatus(200);

        /*-----UPDATE USER DETAILS----*/
        
        $response = $this->actingAs($user)
            ->post('/update-detail', [
                'id'         => $address->id,
                'fullName'   => 'Test User',
                'email'      => 'test@example.com',
                'phone'      => '03212233187', 
                'address'    =>  'Karachi block-7',
                'city'       => 'Karachi',
                'region'     => 'sindh',
                'country'    => 'pakistan',
                'postalCode' => '77150'
            ])->assertStatus(200);

    }

}
