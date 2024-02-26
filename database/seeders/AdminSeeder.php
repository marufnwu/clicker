<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Check if admin email already exists
        $adminExists = User::where('email', 'admin@addincomeperclick.com')->exists();

        // Create the admin user only if the email doesn't exist
        if (!$adminExists) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@addincomeperclick.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // Replace 'your_admin_password' with the actual password
                'phone' => '1234567890', // Replace with a valid phone number
                'gender' => 'Male', // You can adjust this based on your gender enum values
                'area' => 'Admin Area', // Replace with the admin's area
                'refer_by' => null,
                'refer_code' => 'ABCDEF', // Replace with a valid refer code
                'status' => 1,
                'role' => 2, // Assuming 2 represents the admin role in your system
                'level' => 1,
                'last_active' => now(),
            ]);
        }
    }
}
