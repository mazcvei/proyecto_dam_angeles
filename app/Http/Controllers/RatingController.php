<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $ratings = Rating::all();
        return view('ratings.index', compact('ratings'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
           "punctuation" => "required|integer|min:1|max:5",
           "description" => "required|string|min:3"

        ],[
           "punctuation.required" => 'La puntuación es obligatoria',
           "punctuation.integer" => 'La puntuación debe ser un número',
           "punctuation.min" => 'La puntuación mínima es 1',
           "punctuation.max" => 'La puntuación máxima es 5',
           "description.required" => "El campo descripción es obligatorio", 
           "description.string" => "El campo descripción es una cádena de texto", 
           "description.min" => "El campo descripción debe tener mínimo 3 carácteres",
        ]);
        Rating::create([
            "punctuation" => $request->punctuation,
            "description"=> $request->description,
        ]);
         return redirect()
            ->route('ratings.index')
            ->with("success", "Valoración creado correctamente");
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
