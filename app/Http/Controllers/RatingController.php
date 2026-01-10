<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return view('ratings.index', compact('ratings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "order_id" => "required|exists:orders,id",
            "score" => "required|integer|min:1|max:5",
            "description" => "required|string|min:3"
        ], [
            "order_id.required" => "Pedido no válido",
            "order_id.exists" => "Pedido no válido",
            "score.required" => 'La puntuación es obligatoria',
            "score.integer" => 'La puntuación debe ser un número',
            "score.min" => 'La puntuación mínima es 1',
            "score.max" => 'La puntuación máxima es 5',
            "description.required" => "El campo descripción es obligatorio",
            "description.string" => "El campo descripción es una cadena de texto",
            "description.min" => "El campo descripción debe tener mínimo 3 caracteres"
        ]);
        $order = Order::findOrFail($request->order_id);

        // Seguridad: solo el dueño del pedido
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Evitar doble valoración
        if ($order->OrderRatings()->where('user_id', Auth::id())->exists()) {
            return back()->with('success', 'Ya has valorado este pedido.');
        }

        Rating::create([
            "order_id" => $order->id,
            "user_id" => Auth::id(),
            "illustration_type_id" => $order->illustration_type_id,
            "score" => $request->score,
            "description" => $request->description,
        ]);

        return redirect()
            ->route('my.orders')
            ->with("success", "Valoración creada correctamente");
    }
}

