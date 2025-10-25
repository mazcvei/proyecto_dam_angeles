<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\User;

class RolController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();
        //dd($roles);
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           "rol" => "required|max:255|min:3"
        ],[
           "rol.required" => "El campo rol es obligatorio", 
           "rol.max" => "El campo rol debe tener maximo 255 caracteres", 
           "rol.min" => "El campo rol debe tener mínimo 3 caracteres", 
        ]);
        // dd($request->all());
        Rol::create([
            "rol" => $request->rol
        ]);
         return redirect()
            ->route('rol.index')
            ->with("success", "Rol creado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd(User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id = null)
    {
        if ($id) {
            $rol = Rol::find($id);
            if ($rol) {
                return view('roles.create_edit', compact('rol'));
            } else {
                abort(404);
            }
        } else {
            return view('roles.create_edit');
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rol = Rol::find($request->id);
        $rol->rol = $request->rol;
        $rol->save();
        return redirect()
        ->route('rol.index')
        ->with("success", "Rol actualizado correctamente");

    }

    public function destroy($id)
    {
        $rol = Rol::find($id);
        if ($rol) {
            $rol->delete();
            return redirect()
                ->route('rol.index')
                ->with("success", "Rol eliminado correctamente");
        } else {
            abort(404);
        }

    }
}
