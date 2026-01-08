<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()  {
            $settings = Setting::first();

            //return view('vista_mostrar_formulario',compact('settings'))

    }

    public function update(Request $request)  {
         //return view('vista_editar_formulario')
    }
}
