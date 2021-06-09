<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = New User();
        $user1->name = 'User 1';
        $user1->email = 'user1@demo.com';
        $user1->username = 'user1';
        $user1->password = app('hash')->make('password');
        $user1->save();

        $user2 = New User();
        $user2->name = 'User 2';
        $user2->email = 'user2@demo.com';
        $user2->username = 'user2';
        $user2->password = app('hash')->make('password');
        $user2->save();

        $admin = New User();
        $admin->name = 'admin';
        $admin->email = 'admin@demo.com';
        $admin->username = 'admin';
        $admin->is_admin = 1;
        $admin->password = app('hash')->make('password');
        $admin->save();
    }
}
