<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullName'     => 'Admin',
            'email'    => 'admin123@gmail.com',
            'phone'    => '03121112341',
            'password' => bcrypt('Admin101@'),
            'gender'   => 'M',
            'role'     => 'admin',

        ]);
    }
}
