<?php

namespace Database\Seeders;

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
            'name' => 'Marah Ramzy',
            'email' => 'marah@ramzy.ps',
            'password' => Hash::make('password'), // Secure password hashing
        ]);
    }
}
