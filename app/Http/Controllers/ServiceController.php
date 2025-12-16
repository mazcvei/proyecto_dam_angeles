<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index',compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
           "title" => "required|string|min:3",
           "description" => "required|string|min:3"

        ],[
           "title.required" => "El campo título es obligatorio", 
           "title.string" => "El campo título es una cádena de texto", 
           "title.min" => "El campo título debe tener mínimo 3 carácteres", 
           "description.required" => "El campo descripción es obligatorio", 
           "description.string" => "El campo descripción es una cádena de texto", 
           "description.min" => "El campo descripción debe tener mínimo 3 carácteres",
        ]);
        // dd($request->all());
        Service::create([
            "title" => $request->title,
            "description"=> $request->description,
        ]);
         return redirect()
            ->route('services.index')
            ->with("success", "Servicio creado correctamente");
    }

    public function edit($id = null)
    {
        if ($id) {
            $service = Service::find($id);
            if ($service) {
                return view('services.create_edit', compact('service'));
            } else {
                abort(404);
            }
        } else {
            return view('services.create_edit');
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $service = Service::find($request->id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();
        return redirect()
        ->route('services.index')
        ->with("success", "Servicio actualizado correctamente");

    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return redirect()
                ->route('services.index')
                ->with("success", "Servicio eliminado correctamente");
        } else {
            abort(404);
        }

    }

}
