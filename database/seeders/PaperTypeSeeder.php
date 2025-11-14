<?php

namespace Database\Seeders;

use App\Models\PaperType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaperTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        PaperType::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
