<?php

namespace Database\Seeders;

use App\Models\IllustrationType;
use App\Enums\IllustrationEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IllustrationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        IllustrationType::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        $types = [ [IllustrationEnum::REALISMO->name,100], [IllustrationEnum::ACUARELA->name,80]];
        foreach($types as $type){
            IllustrationType::create([
                "type" => $type[0],
                "price"=> $type[1]
            ]);
        }
    }
}
