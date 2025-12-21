<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => 'Acme Corp',
            'tax' => '12345678-1-12',
            'country' => 'Hungary',
            'zip' => '1111',
            'state' => 'Budapest',
            'address' => 'Main Street 1',
        ]);
    }
}
