<?php

namespace Database\Seeders;
use App\Enums\RolEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        User::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        User::factory()->create([
            'name' => 'Usuario admin',
            'email' => 'admin@admin.com',
            'rol_id' => RolEnum::ADMINISTRADOR->value,
            'password' => Hash::make("password")
        ]);

        foreach(range(0,end: 10) as $user_n){
            User::create([
                "name"=> "user_$user_n",
                "email"=> "user_$user_n@user.com",
                "rol_id" => 2,
                "password" => Hash::make("password")
            ]);
        }
    }
}
