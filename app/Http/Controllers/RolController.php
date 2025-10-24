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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol =  $request->rol;
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
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $rol = Rol::find($id);
          if($rol){
            $rol->delete();
          }else{

          }

    }
}
