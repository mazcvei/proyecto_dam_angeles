<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy("date","desc")->get();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
        'paper_type_id'        => 'required|exists:paper_types,id',
        'paper_size_id'        => 'required|exists:paper_sizes,id',
        'illustration_type_id' => 'required|exists:illustration_types,id',
        'num_photos'           => 'required|integer|min:1'
    ], [
        'paper_type_id.required' => 'Debe seleccionar un tipo de papel.',
        'paper_size_id.required' => 'Debe seleccionar un tamaño de papel.',
        'illustration_type_id.required' => 'Debe seleccionar un tipo de ilustración.',
        'num_photos.required' => 'Debe ingresar la cantidad de fotos.',
        'num_photos.min' => 'Debe haber al menos 1 foto.',
    ]);

    Order::create([
        'user_id'              => Auth::id(),        
        'date'                 => now(),             
        'paper_type_id'        => $request->paper_type_id,
        'paper_size_id'        => $request->paper_size_id,
        'illustration_type_id' => $request->illustration_type_id,
        'order_state_id'       => 1,                 
        'num_photos'           => $request->num_photos,
    ]);

    return redirect()
        ->route('orders.index')
        ->with('success', 'Pedido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
        ->orderBy("date","desc")
        ->get();
        return view('orders.index',compact('orders'));
      

    }
}
