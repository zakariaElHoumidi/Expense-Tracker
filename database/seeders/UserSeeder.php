<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'firstname' => 'zakaria',
            'lastname'  => 'houmidi',
            'email'     => 'ziko@ziko',
            'password'  => Hash::make('password'),
        ]);
    }
}
