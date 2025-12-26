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
            <h1>Pedidos</h1>
        </div>
        <div class="col-12 col-md-12" style="text-align:center">
             <a class="btn btn-edit" href="{{ route('create.order') }}">
                                Nuevo Pedido
             </a>
        </div>
        <div class="col-12 col-md-12 m-auto">
            <table class="table caption-top" id="tablaPedidos">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
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
                        <td>{{$order->UserOrder->name}}</td>
                        <td>{{$order->PaperType->type}}</td>
                        <td>{{$order->PaperSize->size}}</td>
                        <td>{{$order->IllustrationType->type}}</td>
                        <td>{{$order->num_photos}}</td>
                        <td>{{$order->OrderState->state}}</td>
                        <td>
                            <a class="btn btn-edit" href="{{route('orders.show',$order->id)}}">
                                <i class="fa-solid fa-eye">

                                </i>
                            </a>
                            @if(\App\Http\Helpers\UsersHelper::checkAdmin())
                            <a class="btn btn-delete" onclick="return confirm('¿Quieres borrar este pedido?')" href="{{ route('orders.delete',$order->id) }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                            @endif

                            @php

                                $isDelivered = $order->OrderState->state === \App\Enums\StateEnum::ENTREGADO->value;
                                $hasRated = $order->hasUserRated(auth()->id());
                            @endphp

                            @if($isDelivered && !$hasRated && !\App\Http\Helpers\UsersHelper::checkAdmin())
                           
                                <button class="btn btn-warning btn-md" data-bs-toggle="modal" data-bs-target="#ratingModal-{{ $order->id }}">
                                    <i class="fa-solid fa-star"></i>
                                </button>
                                <div class="modal fade" id="ratingModal-{{ $order->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ route('rating.store') }}">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Valorar pedido #{{ $order->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label">Puntuación</label>
                                                    <select name="score" class="form-select" required>
                                                        <option value="">Selecciona</option>
                                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                                        <option value="4">⭐⭐⭐⭐</option>
                                                        <option value="3">⭐⭐⭐</option>
                                                        <option value="2">⭐⭐</option>
                                                        <option value="1">⭐</option>
                                                    </select>

                                                    <label class="form-label mt-3">Comentario</label>
                                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Enviar valoración</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif


                        </td>
                    </tr>
                   @endforeach
                   
                </tbody>
            </table>
            <div class="d-flex justify-content-center mb-4" >
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
            new DataTable('#tablaPedidos', {
                language: {
                    info: 'Mostrando página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay elementos disponibles',
                    infoFiltered: '(filtrado de _MAX_ total registros)',
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'No hay registros',
                    search: 'Buscar'
                },
                paging: false
            });



    </script>
@endsection