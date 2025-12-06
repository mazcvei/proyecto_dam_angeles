<?php

namespace Database\Seeders;

use App\Models\IllustrationType;
use App\Models\Order;
use App\Models\OrderState;
use App\Models\PaperSize;
use App\Models\PaperType;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Order::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        foreach(range(1,10) as  $orderNum){
            $User = User::inRandomOrder()->first();
            $IllustrationType = IllustrationType::inRandomOrder()->first();
            $OrderState = OrderState::inRandomOrder()->first();
            $PaperSize = PaperSize::inRandomOrder()->first();
            $PaperType = PaperType::inRandomOrder()->first();

            Order::create([
                "user_id" => $User->id,
                "date" => now(),
                "paper_type_id"=> $PaperType->id,
                "paper_size_id"=> $PaperSize->id,
                "illustration_type_id"=> $IllustrationType->id,
                "state_id"=> $OrderState->id,
                "num_photos"=>rand(1,10),    
            ]);

        }
      
    }
}
