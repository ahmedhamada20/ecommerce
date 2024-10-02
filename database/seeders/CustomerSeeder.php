<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Customer::create([
                'name'=>fake()->unique()->name(),
                'phone'=>fake()->phoneNumber(),
                'image'=>fake()->imageUrl(),
                'email'=>fake()->unique()->safeEmail(),
                'password'=>bcrypt(123456789),
                'rate'=>fake()->numberBetween(1,5) ,
                'fb_link'=> fake()->url(),
                'tw_link'=>fake()->url(),
                'in_link'=>fake()->url(),
            ]);
        }
    }
}
