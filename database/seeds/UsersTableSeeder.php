<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => '$2y$10$C.OrpiwDvF5lo114Xoy6pOfsK9xBwPikOiqDwy/ryE8ANzu1jfoNq',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2019-12-20 12:56:12',
                'verification_token' => '',
                'username'           => '',
                'facebook'           => '',
                'twitter'            => '',
                'instagram'          => '',
            ],
        ];

        User::insert($users);
    }
}
