@extends('layouts.app')

@section('content')
<style>
    .carousel-item>img {
        width: fit-content;
        height: 70vh;
        object-fit: contain;
        border-radius: 3px;
    }
</style>

<div class="container">
    <div class="row">

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
                <div class="col-md-3 card m-auto mt-1">
                    <div class="card-body">
                        <h5 class="card-title">Qué hacemos</h5>
                        <p class="card-text">
                            En IlustraEventos transformamos tus fotografías más especiales en ilustraciones únicas y llenas de emoción. Bodas, bautizos, comuniones o cualquier momento inolvidable: cada evento merece ser recordado de una forma artística, elegante y completamente personalizada.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 card m-auto mt-1">
                    <div class="card-body">
                        <h5 class="card-title">Como lo hacemos</h5>
                        <p class="card-text">
                            Realiza tu pedido de manera sencilla y deja que nuestro equipo dé vida a tus recuerdos. Solo tienes que elegir:
                            <br>
                            🎨 Tipo de ilustración:
                            — Acuarela, con un estilo suave, romántico y lleno de color
                            — Realismo, para un acabado detallado y fiel a tu fotografía
                            <br>
                            📐 Tamaño:
                            — A5
                            — A6
                            <br>
                            📄 Tipo de papel:
                            — Cartulina artística
                            — Papel fotográfico de alta calidad

                        </p>
                    </div>
                </div>
                <div class="col-md-3 card m-auto mt-1">
                    <div class="card-body">
                        <h5 class="card-title">Resultado final</h5>
                        <p class="card-text">
                            Una vez realizado el pedido, comenzamos a trabajar en tu ilustración. Solo se requiere un adelanto del 25% para reservar tu encargo, y te enviaremos la obra final terminada y lista para disfrutar o regalar.
                            <br>
                            En IlustraEventos no solo ilustramos fotos: capturamos emociones, contamos historias y creamos recuerdos eternos.
                            <br>
                            ✨ Dale un toque especial a tus momentos más importantes. Te esperamos.
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-12 col-md-8 m-auto py-4" id="contacto">
            <form>
                <div class="row">
                    <div class="col-12">
                        <h1>Contacto</h1>
                    </div>
                    <div class="col-md-4">
                        <label>Nombre y apellidos </label>
                        <input class="form-control" type="text" name="nombre">
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label>Teléfono</label>
                        <input class="form-control" type="number" name="telefono">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label>Mensaje</label>
                        <textarea rows="10" class="form-control" name="mensaje" placeholder="Escbribe tu mensaje..."></textarea>
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