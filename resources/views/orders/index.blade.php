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
                        <th scope="col">Tipo de papel</th>
                        <th scope="col">Tamaño de papel</th>
                        <th scope="col">Tipo de ilustracion</th>
                        <th scope="col">Número de fotos</th>
                        <th scope="col">Estado del pedido</th>
                        <th scope="col">Imagenes</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->PaperType->type}}</td>
                        <td>{{$order->PaperSize->size}}</td>
                        <td>{{$order->IllustrationType->type}}</td>
                        <td>{{$order->num_photos}}</td>
                        <td>{{$order->OrderState->state}}</td>
                        <td>
                            @if(count($order->OrderImages)>0)
                                <img width="120" src="{{  asset('storage/'. $order->OrderImages[0]->image_path ) }}">
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-edit" href="{{route('orders.show',$order->id)}}">
                                <i class="fa-solid fa-eye">

                                </i>
                            </a>
                            <a class="btn btn-delete" onclick="return confirm('¿Quieres borrar este pedido?')" href="{{ route('orders.delete',$order->id) }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
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