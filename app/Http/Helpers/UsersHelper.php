<?php
namespace App\Http\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersHelper{
    public static function checkAdmin($idUser){
        //True si es admin 
        $user = $idUser ? User::find($idUser) : Auth::user();
        if (!$user) {
            return false;
        }
        return $user->rol_id === 1;
    }
}
?>