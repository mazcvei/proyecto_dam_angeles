<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::factory()->create([
            'name' => 'Usuario admin',
            'email' => 'admin@admin.com',
            'rol_id' => 1,
            'password' => Hash::make("password")
        ]);

        foreach(range(0,99) as $user_n){
            User::create([
                "name"=> "user_$user_n",
                "email"=> "user_$user_n@user.com",
                 'rol_id' => 2,
                "password" => Hash::make("password")
            ]);
        }
    }
}
