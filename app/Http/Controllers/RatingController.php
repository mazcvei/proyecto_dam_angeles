<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
           "score" => "required|integer|min:0|max:5",
           "description" => "required|string|min:3"

        ],[
           "score.required" => 'La puntuación es obligatoria',
           "score.integer" => 'La puntuación debe ser un número',
           "score.min" => 'La puntuación mínima es 0',
           "score.max" => 'La puntuación máxima es 5',
           "description.required" => "El campo descripción es obligatorio", 
           "description.string" => "El campo descripción es una cádena de texto", 
           "description.min" => "El campo descripción debe tener mínimo 3 carácteres",
        ]);
        Rating::create([
            "score" => $request->score,
            "description"=> $request->description,
        ]);
         return redirect()
            ->route('my.orders')
            ->with("success", "Valoración creada correctamente");
    }

}
