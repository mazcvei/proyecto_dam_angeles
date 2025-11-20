<?php

namespace Database\Seeders;

use App\Enums\StateEnum;
use App\Models\OrderState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        OrderState::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $states = [StateEnum::PREPARACION->name, StateEnum::ENVIADO->name, StateEnum::PAGADO->name, 
                    StateEnum::ENTREGADO->name, StateEnum::PENDIENTE_PAGO->name, StateEnum::CANCELADO->name,];
        foreach($states as $state){
            OrderState::create([
                "state" => $state
            ]);

        /*$states = [StateEnum::PREPARACION->name, StateEnum::ENVIADO->name, StateEnum::PAGADO->name, 
                    StateEnum::ENTREGADO->name, StateEnum::PREPARACION->name, StateEnum::PENDIENTE_PAGO->name, StateEnum::CANCELADO->name,];
        foreach($states as $state){
            OrderState::create([
                "state" => $state
            ]);*/
        }
    }
}
