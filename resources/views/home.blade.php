@extends('layouts.app')

@section('content')
<style>
    .carousel-item>img {
        width: fit-content;
        height: 70vh;
        object-fit: contain;
        border-radius: 3px;
    }

    .card {
        height: 55vh;
    }

    @media (max-width: 680px) {
        .card {
            height: auto;
        }

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

                    @if(count($photos) > 0)
                        @foreach($photos as $photo)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img
                                src="{{ asset('storage/' . $photo) }}"
                                class="d-block w-100"
                                alt="Imagen carrusel">
                        </div>
                        @endforeach
                    @endif
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

        <div class="col-12 py-4" id="resenas">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h1>Reseñas</h1>
                </div>
            </div>
            <div class="row text-center owl-carousel owl-theme mt-4">

                @foreach($ratings as $rating)
                <div class="mb-5 mb-md-0 item">
                    <h5 class="mb-3">{{$rating->ratingUser->name}}</h5>
                    <h6 class="text-primary mb-3">Tipo de Servicio: {{$rating->order->IllustrationType->type}}</h6>
                    <p class="px-xl-3">
                        <i class="fas fa-quote-left pe-2"></i>{{ $rating->description }}
                    </p>
                    <ul class="list-unstyled d-flex justify-content-center mb-0">
                        @for($i=0; $i<$rating->score; $i++)
                            <li>
                                <i class="fas fa-star fa-sm text-warning"></i>
                            </li>
                            @endfor
                            @for($i=$rating->score; $i<5; $i++)
                                <li>
                                <i class="far fa-star fa-sm text-warning"></i>
                                </li>
                                @endfor
                    </ul>
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
                        <input class="form-control" type="number" min="600000000" value="{{ old('phone') }}" name="phone">
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

@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
</script>
@endsection