<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function show()
    {
        $settings = Setting::first();
        return view('settings.create_edit', compact('settings'));
    }

    public function update(Request $request)
    {
        //dd(count($request->file('images')));
        $request->validate([
            'description' => 'required|string|min:5|max:250',
            'email_contact' => 'required|email',
            'phone_contact' => 'required|regex:/^[67]\d{8}$/',
            'url_instagram' => 'nullable|url',
            'images'        => 'nullable|array|max:10',
            'images.*'      => 'nullable|mimes:jpeg,jpg,png|max:6250'
        ], [
            'url_instagram.url' => 'Debe tener un formato de URL válido.',
            'email_contact.required'   => 'Debe escribir un email.',
            'email_contact.email'   => 'Debe ser un email correcto.',
            'phone_contact.required'   => 'Debe escribir un teléfono.',
            'phone_contact.regex'   => 'el teléfono debe empezar por 6 o 7 y contener 9 dígitos.',
            'description.required' => 'Debe tener un formato de URL válido.',
            'description.string' => 'La descripción debe ser un texto.',
            'description.min' => 'La descripción debe tener mínimo 5 caracteres.',
            'description.max' => 'La descripción debe tener maximo 250 caracteres.',
            'images.array'       => 'Debe añadir alguna imagen.',
            'images.max' => 'Como maximo puedes subir 10 imágenes',
            'images.*.mimes'   => 'Extensión no válida.',

        ]);

        $settings = Setting::firstOrCreate();
        $images = $request->file('images');
        if (is_array($images) && count($images) > 0) {
            $photos = [];
            $files = Storage::disk('public')->files('carousel_images');
            Storage::disk('public')->delete($files);

            foreach ($request->file('images') as $image) {
                $path = $image->store('carousel_images', 'public');
                array_push($photos, $path);
            }
            $settings->photos_carousel = json_encode($photos);
        }

        $settings->description = $request->description;
        $settings->email_contact = $request->email_contact;
        $settings->phone_contact = $request->phone_contact;
        $settings->url_instagram = $request->url_instagram;

        $settings->save();

        return redirect()->route('setting.show')
            ->with('success', 'Configuración guardada correctamente');
    }
}
