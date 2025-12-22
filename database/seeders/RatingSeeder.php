<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Rating::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        Rating::create([
            'punctuation' => 5,
            'description' => 'Excelente servicio'
        ]);
    }
}
