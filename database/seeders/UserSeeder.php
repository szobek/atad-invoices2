<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            "name" => "Kunszt Norbi",
            "role" => "admin",
            "email" => "kunszt.norbert@gmail.com",
            "password" => Hash::make("ushaeW3."),
        ]);
        User::create([
            "name" => "Gábor & Barbi",
            "role" => "sales",
            "email" => "kunszt.norbert2@gmail.com",
            "password" => Hash::make("ushaeW3."),
        ]);
        User::create([
            "name" => "John Doe",
            "email" => "l",
            "password" => Hash::make("ushaeW3."),
        ]);
        
    }
}
