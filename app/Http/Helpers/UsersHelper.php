<?php
namespace App\Http\Helpers;

use App\Enums\RolEnum;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersHelper{
    public static function checkAdmin(){
        //True si es admin 
        return Auth::user()->rol_id === RolEnum::ADMINISTRADOR->value; 
    }
}
?>