@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="col-12">
            <h1>Roles</h1>
        </div>
        <div class="col-12 col-md-12" style="text-align:center">
             <a class="btn btn-edit" href="{{ route('rol.create.edit') }}">
                                Nuevo Pedido
             </a>
        </div>
        <div class="col-12 col-md-12 m-auto">
            <table class="table caption-top">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo de papel</th>
                        <th scope="col">Tamaño de papel</th>
                        <th scope="col">Tipo de ilustracion</th>
                        <th scope="col">Número de fotos</th>
                        <th scope="col">Estado del pedido</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->paper_type_id}}</td>
                        <td>{{$order->paper_size_id}}</td>
                        <td>{{$order->illustration_type_id}}</td>
                        <td>{{$order->num_photos}}</td>
                        <td>{{$order->order_state_id}}</td>
                        <td>
                            <a class="btn btn-edit" href="{{ route('orders.create.edit',$order->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-delete" onclick="return confirm('¿Quieres borrar este pedido?')" href="{{ route('orders.delete',$order->id) }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                   @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection