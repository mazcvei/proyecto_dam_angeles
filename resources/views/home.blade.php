@extends('layouts.app')

@section('content')
<style>
    .carousel-item>img {
        width: fit-content;
        height: 70vh;
        object-fit: contain;
        border-radius: 3px;
    }
    .card{
        height: 58vh;
    }
</style>

<div class="container">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="col-12 py-4" id="carrusel">
            <h1>Algunos trabajos</h1>
            <div id="carouselMuestras" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/img1.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/img2.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/img3.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/img4.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMuestras" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMuestras" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>

        </div>
    
   
        <div class="col-12 py-4" id="servicios">
            <h1>Nuestros servicios</h1>
            <div class="row">
                @foreach ( $services as $service )
                <div class="col-md-3 card m-auto mt-1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->title }}</h5>
                        <p class="card-text">{{ $service->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>


        <div class="col-12 col-md-8 m-auto py-4" id="contacto">
            <form action="{{ route('create.contact') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1>Contacto</h1>
                    </div>
                    <div class="col-md-4">
                        <label>Nombre y apellidos </label>
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name">
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                        <input class="form-control" type="email" value="{{ old('email') }}" name="email">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label>Teléfono</label>
                        <input class="form-control" type="number" min="600000000"  value="{{ old('phone') }}" name="phone">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label>Mensaje</label>
                        <textarea rows="10" class="form-control" name="message" placeholder="Escbribe tu mensaje...">{{ old('message') }}</textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>


@endsection