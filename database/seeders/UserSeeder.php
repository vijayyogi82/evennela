<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'adminuser',
            'email' => 'admin@gmail.com',
            'phone' => '9874563210',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);
    }
}
