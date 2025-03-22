<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomUserSeeder extends Seeder
{

    public function run(): void
    {
        $email = $this->command->ask('Enter email:');
        $username = $this->command->ask('Enter username:');
        $password = $this->command->secret('Enter password:');

        $existingUser = User::where('email', $email)->orWhere('name', $username)->first();
        if ($existingUser) {
            $this->command->error('User with this email or username already exists!');
            return;
        }
        User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->command->info('User created successfully!');
    }
}
