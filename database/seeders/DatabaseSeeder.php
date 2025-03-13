<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
        ]);

        User::create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => bcrypt('password123'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password123'),
            'role_id' => 1,
        ]);
    }
}