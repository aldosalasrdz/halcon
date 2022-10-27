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
            // [
            //     'name' => 'Sales',
            //     'email' => 'sales@halcon.com',
            //     'password' => '$2y$10$TIveFbJRjGbvvZyhnCdSruLqquYqDEZcGVQqgu1MjzbQA6RZ1z9l2',
            //     'role_id' => 2,
            //     'created_at' => now()
            // ],
            // [
            //     'name' => 'Purchasing',
            //     'email' => 'purchasing@halcon.com',
            //     'password' => '$2y$10$30lwQo.jj5u1Vrm/T01/oudgwbRHVivyx1jA9QsnfAC/.FbNRLuXC',
            //     'role_id' => 3,
            //     'created_at' => now()
            // ],
            // [
            //     'name' => 'Route',
            //     'email' => 'route@halcon.com',
            //     'password' => '$2y$10$VkedG5dt3qE1l355/yxP7uxFwrhN6gsZ96g/V0hvVi9/OIad3u8XO',
            //     'role_id' => 4,
            //     'created_at' => now()
            // ],
            // [
            //     'name' => 'Warehouse',
            //     'email' => 'warehouse@halcon.com',
            //     'password' => '$2y$10$ZY19w/yd90qQZiKErohQW.jez68tf2PRC0in.KwDiVFktZRJr4s6C',
            //     'role_id' => 5,
            //     'created_at' => now()
            // ],
        ]);
    }
}
