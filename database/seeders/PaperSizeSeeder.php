<?php

namespace Database\Seeders;

use App\Models\PaperSize;
use App\Enums\PaperSizeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaperSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        PaperSize::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        $sizes = [PaperSizeEnum::A6->name, PaperSizeEnum::A5->name];
        foreach($sizes as $size){
            PaperSize::create([
                "size" => $size
            ]);
        }
    }
}
