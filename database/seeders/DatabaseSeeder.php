<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Roles factory
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'description' => 'Administration role',
                'created_at' => now()
            ],
            [
                'name' => 'Sales',
                'description' => 'Sales role',
                'created_at' => now()
            ],
            [
                'name' => 'Purchasing',
                'description' => 'Purchasing role',
                'created_at' => now()
            ],
            [
                'name' => 'Route',
                'description' => 'Route role',
                'created_at' => now()
            ],
            [
                'name' => 'Warehouse',
                'description' => 'Warehouse role',
                'created_at' => now()
            ],
        ]);

        // Users factory
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@halcon.com',
                'password' => '$2y$10$9Z57mRnxZDASonXxghPHj.34y5sUTFGFcQXlpjoLEaZN9cBUu3JoO',
                'role_id' => 1,
                'created_at' => now()
            ],
        ]);

        /* Company::factory(50)->create(); */
    }
}
