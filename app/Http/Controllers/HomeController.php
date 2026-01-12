<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Rating;
use App\Models\User;
use App\Models\Rol;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;
use App\Mail\ContactEmail;

class HomeController extends Controller
{
    public function index(){
        $services = Service::limit(3)->get();
        $ratings = Rating::orderBy('score', 'desc')->limit(10)->get();
        $settings = Setting::first();
        $photos = json_decode($settings?->photos_carousel) ?? [];
        return view('home',compact('services','ratings','settings','photos'));  
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:10|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[67]\d{8}$/',
            'message' => 'required|string|min: 10|max:1000',
        ],[
            'name.required'   => 'Debe escribir un nombre y apellidos.',
            'name.string'         => 'El nombre debe ser una cadena de texto.',
            'name.min' => 'El nombre debe ser como mínimo de 10 carácteres.',
            'name.max'       => 'El nombre debe ser como máximo 1000 carácteres.',

            'email.required'   => 'Debe escribir un email.',
            'email.email'   => 'Debe ser un email correcto.',

            'phone.required'   => 'Debe escribir un teléfono.',
            'phone.regex'   => 'el teléfono debe empezar por 6 o 7 y contener 9 dígitos.',

            'message.required'   => 'Debe escribir un mensaje.',
            'message.string'         => 'El mensaje debe ser una cadena de texto.',
            'message.min' => 'El mensaje debe ser como mínimo de 10 carácteres.',
            'message.max'       => 'El mensaje debe ser como máximo 1000 carácteres.',

        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        
        Resend::emails()->send([
            'from' => 'Acme <onboarding@resend.dev>',
            'to' => 'angeles.trejo.croce@gmail.com',
            'subject' => 'Prueba contacto',
            'html' => (new ContactEmail($contact))->render(),
        ]);
        return redirect()
            ->route('home')
            ->with('success', 'Contacto enviado correctamente');

    }
}
