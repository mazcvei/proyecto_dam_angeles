<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
         return view('home');

    }

    public function storeContact(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|min:10|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[67]\d{8}$/',
            'message' => 'required|string|min: 10|max:255',
        ],[
            'name.required'   => 'Debe escribir un nombre y apellido.',
            'name.string'         => 'Debe ser una cadena de texto.',
            'name.min' => 'Debe ser como minimo 10 caracteres.',
            'name.max'       => 'Debe ser como maximo 255 carcteres.',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Contacto enviado correctamente');
    }
}
