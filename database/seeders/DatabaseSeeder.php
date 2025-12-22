<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IllustrationTypeSeeder::class);
        $this->call(OrderStateSeeder::class);
        $this->call(PaperSizeSeeder::class);
        $this->call(PaperTypeSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(RatingSeeder::class);

    }
}
