<?php

namespace App\Http\Controllers;

use App\Models\IllustrationType;
use App\Models\Order;
use App\Models\OrderImages;
use App\Models\OrderState;
use App\Models\PaperSize;
use App\Models\PaperType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy("date","DESC")->paginate(20);
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paperTypes = PaperType::all();
        $paperSizes = PaperSize::all();
        $ilustrationTypes = IllustrationType::all();
        return view('orders.create',compact('paperTypes','paperSizes','ilustrationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $request->validate([
        'paper_type'        => 'required|exists:paper_types,id',
        'size'              => 'required|exists:paper_sizes,id',
        'illustration_type' => 'required|exists:illustration_types,id',
        'images'            => 'required|array',      
        'images.*'          => 'required|mimes:jpeg,jpg,png|max:6250'
    ],  [
        'paper_type.required'   => 'Debe seleccionar un tipo de papel.',
        'size.required'         => 'Debe seleccionar un tamaño de papel.',
        'illustration_type.required' => 'Debe seleccionar un tipo de ilustración.',
        'images.required'       => 'Debe añadir alguna imagen.',
        'images.array'       => 'Debe añadir alguna imagen.',
        'images.*.max'            => 'Debe tener como máximo 6mb.',
        'images.*.mimes'            => 'Extensión no válida.',
        'paper_type.exists'     => 'Tipo de papel no válido',
        'size.exists'           => 'Tamaño de papel no válido',
        'illustration_type.exists'   => 'Tipo de ilustración no válida',
    ]);

    $order = Order::create([
        'user_id'              => Auth::id(),        
        'date'                 => now(),             
        'paper_type_id'        => $request->paper_type,
        'paper_size_id'        => $request->size,
        'illustration_type_id' => $request->illustration_type,
        'order_state_id'       => 1,                 
        'num_photos'           => count($request->images),
    ]);

    foreach($request->file('images') as $image){
        $path = $image->store('order_images','public');
        OrderImages::create([
            'order_id'              =>  $order->id,        
            'image_path'            =>  $path,             
        ]);
    }

    return redirect()
        ->route('orders.index')
        ->with('success', 'Pedido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orderStates = OrderState::all();
        return view('orders.show', compact('order','orderStates'));
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
    public function updateState(Order $order, Request $request)
    {
        $order->update(['state_id'=> $request->state]);
        return redirect()->back()->with('success', 'Estado actualizado correctamente');
    }
}
