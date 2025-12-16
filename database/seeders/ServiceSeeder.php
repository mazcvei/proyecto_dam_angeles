<?php

namespace Database\Seeders;

use App\Models\Service;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Service::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        Service::create([
            'title' => '¿Qué hacemos?',
            'description' => 'En IlustraEventos transformamos tus fotografías más especiales en ilustraciones únicas y llenas de emoción. Bodas, bautizos, comuniones o cualquier momento inolvidable: cada evento merece ser recordado de una forma artística, elegante y completamente personalizada.'
        ]);

        Service::create([
            'title' => '¿Como lo hacemos?',
            'description' => 'Realiza tu pedido de manera sencilla y deja que nuestro equipo dé vida a tus recuerdos. Solo tienes que elegir el Tipo de ilustración (acuarela o realismo), el tamaño de la ilustracón (A5 o A6) y por último el tipo de papel (Cartulina artística o papel fotográfico).'
        ]);

        Service::create([
            'title' => 'Resultado final',
            'description' => 'Una vez realizado el pedido, trabajamos en tu ilustración. solo se requiere un adelanto del 25% para reservar tu encargo y te enviaremos la obra final terminada para disfrutar o regalar.'
        ]);
    }
}
