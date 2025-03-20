<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{


    public function run(): void
    {
        $amount = $this->command->ask('How many users would you like to create?',500);
        $password = $this->command->secret('What is your password?');

        $faker = Factory::create();

        $this->command->getOutput()->progressStart($amount);

      for($i = 0; $i < 500; $i++)
      {
          User::create([
              'name' => $faker->name,
              'email' => $faker->email,
              'password' => Hash::make($password),
          ]);

          $this->command->getOutput()->progressAdvance();
      }
      $this->command->getOutput()->progressFinish();
    }
}
