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
        User::create([
            "name" => "Kunszt Norbi",
            "email" => "kunszt.norbert@gmail.com",
            "role" => "admin",
            "password" => Hash::make("ushaeW3."),
        ]);
        User::create([
            "name" => "Gábor & Barbi",
            "email" => "kunszt.norbert2@gmail.com",
            "role" => "sales",
            "password" => Hash::make("ushaeW3."),
        ]);
        User::create([
            "name" => "Üzletkötő 1",
            "email" => "atadcleankftdev@gmail.com",
            "role" => "salesperson",
            "password" => Hash::make("ushaeW3."),
        ]);
        User::create([
            "name" => "Üzletkötő 2",
            "email" => "atadcleankftdev2@gmail.com",
            "role" => "salesperson",
            "password" => Hash::make("ushaeW3."),
        ]);
    }
}
