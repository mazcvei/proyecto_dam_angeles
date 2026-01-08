<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;
use App\Models\User;

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
        foreach(range(0,5) as $elem){
            $user = User::inRandomOrder()->first();
            $order = Order::inRandomOrder()->first();
            Rating::create([
                'user_id'=> $user->id,
                'order_id'=> $order->id,
                'illustration_type_id'=> $order->illustration_type_id,
                'score' => rand(0,5),
                'description' => 'Excelente servicio'
        ]);
        }
      
    }
}
