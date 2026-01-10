@extends('layouts.app')

@php
use App\Enums\StateEnum;
@endphp

@section('post_head')
<style>
    body {
        background-color: #f8f9fa !important;
    }
    th{
        text-align: start;
    }

    .order-list>li,
    .total_price {
        font-weight: bold;
        list-style: circle;
    }

    .mx-auto {
        margin-right: auto !important;
        margin-left: auto !important;
    }

    .btn-upload {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s
    }

    .btn-upload:hover {
        background-color: #0b5ed7
    }


    .rounded {
        border-radius: 0.25rem !important;
    }

    img {
        max-width: 100%;
        height: auto;
        vertical-align: top;
    }


    .carousel-item img {
        border-radius: 5px;
        max-height: 60vh;
        object-fit: cover;
        object-position: center;
    }

    .btn-upload {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s
    }

    .btn-upload:hover {
        background-color: #0b5ed7
    }

    .error_message {
        color: red;
        font-weight: bold;
    }

    .table_container {
        height: 40vh;
        overflow-y: scroll;

    }

    table {
        background-color: #cad1f1;
        border-radius: 5px;

    }

    @media screen and (max-width: 767px) {
        .accordion-style .btn-link {
            padding: 15px 40px 15px 55px;
        }
    }

    @media screen and (max-width: 575px) {
        .accordion-style .btn-link {
            padding: 15px 30px 15px 55px;
        }
    }
</style>

@endsection
@section('content')

<div class="container">

    <div class="row align-items-center">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- COLUMNA IZQUIERDA -->
        <div class="col-lg-6 mb-4 mb-lg-0 mt-4">

            <!-- CARRUSEL -->
            <div id="carrusel_imagenes" class="mx-auto text-center mb-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="carrusel_inner_container">
                        @foreach($order->orderImages as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{  asset('storage/'. $image->image_path ) }}" class="d-block w-100" alt="wedding-6873668_640.jpg">
                        </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            @if(\App\Http\Helpers\UsersHelper::checkAdmin())
            <div class="mx-auto text-center">
                <a href="{{ route('orders.download.images',$order->id) }}" class="btn-upload">
                    <i class="bi bi-download"></i> Descargar imágenes
                </a>

            </div>
            @endif



        </div>

        <!-- COLUMNA DERECHA -->
        <div class="col-lg-6">

            <div class="ps-lg-6 ps-xl-10 w-lg-90">

                <div class="mb-4">
                    <h2 class="w-90">Datos del pedido</h2>
                </div>
                <div>
                    <ul class="items-order order-list">
                        <li>
                            <label>Fecha del pedido: {{ \Carbon\Carbon::parse($order->date)->format('d-m-Y H:i:s') }}</label>
                        </li>
                        <li>
                            <label>Usuario: {{$order->UserOrder->name }}</label>
                        </li>
                        <li>
                            <label>Tipo de papel: {{ $order->PaperType->type}}</label>
                        </li>
                        <li>
                            <label>Tamaño de papel: {{ $order->PaperSize->size}}</label>
                        </li>
                        <li>
                            <label>Tipo de ilustración: {{ $order->IllustrationType->type }} ({{ $order->IllustrationType->price }}€)</label>
                        </li>
                        <li>

                            <div class="row">
                                <div class="col-lg-4">
                                    <span style="line-height: 38px;">Estado del pedido: </span>
                                </div>
                                @if(\App\Http\Helpers\UsersHelper::checkAdmin())
                                <form style="display: contents;" action="{{ route('order.update.state',$order->id) }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <select class="form-select" name="state">
                                            @foreach($orderStates as $state)
                                            <option @if($order->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-center">
                                            <button type="submit" class="btn-upload" id="btn_order">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                                @else
                                <div class="col-lg-6">
                                    <select class="form-select" name="state" disabled>
                                        @foreach($orderStates as $state)
                                        <option @if($order->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->state}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>

                        </li>
                        <li>
                            <label>Número de fotos: {{ $order->num_photos }}</label>
                        </li>
                        <li>
                            <span class="total_price mt-4">PRECIO TOTAL: {{ number_format($order->IllustrationType->price * $order->num_photos,2) }}€ </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 



    </div> <!-- FIN ROW -->
    <div class="row mt-4">
        <h1 class="m-2 text-center">RESEÑAS</h1>
        <div class="col-12 table_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Comentario</th>
                        <th>Tipo Ilustración</th>
                        <th>Puntuación</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($order->OrderRatings as $rating)
                    <tr>
                        <td class="w-10">{{$rating->ratingUser->name}}</td>
                        <td class="text-start w-50">{{$rating->description}}</td>
                        <td class="text-start w-25">{{$rating->illustrationType->type}}</td>
                        <td class="w-35">
                            @for($i=0; $i<$rating->score; $i++)
                                <i class="fa-solid fa-star" style="color:orange"></i>
                            @endfor
                            @for($i=$rating->score; $i<5; $i++)
                                    <i class="fa-regular fa-star"></i>
                            @endfor
                        </td>
                        <td class="w-25">{{ Carbon\Carbon::parse($rating->created_at)->format('d-m-Y H:i:s')  }}</td>
                    </tr>
                    @empty
                    <h3>No hay valoraciones</h3>
                    @endforelse


                </tbody>
            </table>

        </div>
    </div>

</div>

<script>
    const btn_order = document.getElementById('btn_order');

    const carrusel_imagenes = document.getElementById('carrusel_imagenes');
    const carrusel_inner_container = document.getElementById('carrusel_inner_container');
    const file_allow = ["image/jpeg", "image/jpg", "image/png"];
    const container_errors = document.getElementById('errors');
    const TAM_MAX = 6250000 //bytes
</script>

@endsection