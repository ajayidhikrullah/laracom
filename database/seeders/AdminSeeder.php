<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        Admin::create([
            'name' => $faker->name,
            'email' => 'admin@laracom.com',
            'password' => bcrypt('password'),
        ]);
    }
}
