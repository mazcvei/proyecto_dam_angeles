<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Setting::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        Setting::create([
            'description' => "Capturamos emociones, contamos historias y creamos recuerdos eternos.",
            'email_contact' => "ilustraeventos@recuerdos.com",
            'phone_contact' => "645411961",
            'url_instagram' => "https://www.instagram.com/ilustrasetting/",
            'photos_carousel' => null,
            'logo' => null,
            'primary_color' => "#96D9F8",
            'secondary_color' => "#96A8F8",
            'auxiliar_color' => "#B596F8",
        ]);

    }
}
