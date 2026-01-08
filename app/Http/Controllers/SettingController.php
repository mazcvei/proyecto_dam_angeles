<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()  {
            $settings = Setting::first();
            return view('settings.vista_mostrar_formulario',compact('settings'));
    }

    public function update(Request $request)  {
          $request->validate([
            'description' => 'required|string',
            'email_contact' => 'required|email',
            'phone_contact' => 'required|string',
            'url_instagram' => 'nullable|url',
        ]);

        $settings = Setting::first();
        if (!$settings) {
            $settings = new Setting();
        }

        $settings->description = $request->description;
        $settings->email_contact = $request->email_contact;
        $settings->phone_contact = $request->phone_contact;
        $settings->url_instagram = $request->url_instagram;
        $settings->save();

        return redirect()->route('setting.show')->with('success', 'Configuración guardada correctamente');
    }
}
