<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('admins')->insert([
        //     'name' => 'Admin User',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('admin1234'), // Hash the password
        //      'role' => 'admin'
        // ]);

        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => Hash::make('manager1234'), // Hash the password
             'role' => 'manager',
             'status' => 'active'
        ]);

        // DB::table('settings')->insert([
        //     'smtp_user' => null,
        //     'smtp_host' => null,
        //     'smtp_password' => null,
        //     'currency' => '₦',
        //     'site_name' => 'Food Stuff Alleviation',
        //     'site_short_name' => 'FoodStuff',
        //     'site_email' => null,
        //     'phone' => '1234567890',
        //     'website' => 'localhost/',
        //     'address' => 'Kumbotso, Kano State',
        //     'charges' => null,
        //     'logo' => null,
        //     'favicon' => null,
        //     'welcome_message' => 'Welcome to Food Stuff Alleviation Portal',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        
    }
}
