<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Invoice::truncate();
        Partner::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->call([
            UserSeeder::class,
        ]);
        Invoice::factory(1000)->create();
        Partner::factory(1000)->create();
    }
}
