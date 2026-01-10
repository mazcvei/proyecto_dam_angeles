@extends('layouts.app')

@section('post_head')
<style>
    body {
        background-color: #f8f9fa !important;
    }

    .accordion-style .card {
        background: transparent;
        box-shadow: none;
        margin-bottom: 15px;
        margin-top: 0 !important;
        border: none;
    }

    .accordion-style .card:last-child {
        margin-bottom: 0;
    }

    .accordion-style .card-header {
        border: 0;
        background: none;
        padding: 0;
        border-bottom: none;
    }

    .accordion-style .btn-link {
        color: #0d6efd;
        position: relative;
        display: block;
        width: 100%;
        text-align: left;
        white-space: normal;
        box-shadow: none;
        padding: 15px 55px;
        text-decoration: none;
    }

    .mx-auto {
        margin-right: auto !important;
        margin-left: auto !important;
    }

    .rounded {
        border-radius: 0.25rem !important;
    }

    img {
        max-width: 100%;
        height: auto;
        vertical-align: top;
    }

    .accordion-style .btn-link:hover {
        text-decoration: none;
    }

    .accordion-style .btn-link.collapsed {
        color: #575a7b;
    }

    .accordion-style .btn-link.collapsed:after {
        content: "+";
        position: absolute;
        top: 50%;
        left: 0;
        font-size: 1rem;
        color: #0d6efd;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translateY(-50%);
        box-shadow: 8px 8px 30px 0 rgba(0, 0, 0, 0.12);
    }

    .accordion-style .btn-link:after {
        content: "-";
        position: absolute;
        top: 50%;
        left: 0;
        font-size: 1rem;
        color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translateY(-50%);
        box-shadow: 8px 8px 30px 0 rgba(0, 0, 0, 0.12);
    }

    .accordion-style .card-body {
        padding-top: 0px;
        padding-left: 3.5rem;
        padding-bottom: 0;
    }

    .accordion-style .card-body:before {
        position: absolute;
        content: "";
        border-style: dashed;
        border-width: 0 0 0 1.2px;
        border-color: #0b5ed7;
        left: 20px;
        top: 0;
        z-index: 1;
        bottom: 0;
    }

    #carrusel_imagenes {
        display: none;
    }

    #images {
        display: none;
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
        padding: 10px 18px;
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
    <form id="pedidoForm" enctype="multipart/form-data" method="post" action="{{ route('orders.store') }}">
        @csrf
        <div class="row align-items-center">
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
                        <div class="carousel-inner" id="carrusel_inner_container"></div>

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

                <!-- ERRORES -->
                <div class="mx-auto text-center" id="errors"></div>

                <!-- BOTÓN SUBIR IMÁGENES -->
                <div class="mx-auto text-center">
                    <label for="images" class="btn-upload">
                        <i class="bi bi-upload"></i> Seleccionar imágenes
                    </label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*">
                </div>
            </div>

            <!-- COLUMNA DERECHA -->
            <div class="col-lg-6">

                <div class="ps-lg-6 ps-xl-10 w-lg-90">

                    <div class="mb-4">
                        <h2 class="w-90">Elige las opciones para tu ilustración</h2>
                    </div>

                    <p class="mb-4">
                        Selecciona el tipo de papel, tamaño y estilo de ilustración que deseas.
                        ¡Nos encargamos del resto!
                    </p>

                    <div id="accordion" class="accordion-style">

                        <!-- TIPO DE PAPEL -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Tipo de papel
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion">
                                <div class="card-body position-relative">
                                    @foreach($paperTypes as $type)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="paper_type"
                                            id="papel_fotografico_{{ $type->id }}" value="{{ $type->id }}">
                                        <label class="form-check-label" for="papel_fotografico_{{ $type->id }}">
                                            {{$type->type}}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <!-- TAMAÑO -->
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Tamaño de la ilustración
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion">
                                <div class="card-body position-relative">
                                    @foreach($paperSizes as $paperSize)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="size"
                                            id="tamano_{{ $paperSize->id }}" value="{{ $paperSize->id }}">
                                        <label class="form-check-label" for="tamano_{{  $paperSize->id }}">
                                            {{ $paperSize->size }}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <!-- TIPO DE ILUSTRACIÓN -->
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Tipo de ilustración
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion">
                                <div class="card-body position-relative">
                                    @foreach($ilustrationTypes as $ilustrationType)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="illustration_type"
                                            id="tipo_ilustracion_{{ $ilustrationType->id }}" value="{{ $ilustrationType->id }}">
                                        <label class="form-check-label" for="tipo_ilustracion_{{ $ilustrationType->id }}">
                                            {{ $ilustrationType->type }}
                                        </label>
                                    </div>
                                    @endforeach


                                    <!-- BOTÓN ENVIAR -->
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn-upload px-5" id="btn_order">
                                            Enviar pedido
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div> <!-- FIN ACORDEÓN -->
                </div>

            </div> <!-- FIN COLUMNA DERECHA -->



        </div> <!-- FIN ROW -->

    </form>
</div>



<script>
    const btn_order = document.getElementById('btn_order');

    const carrusel_imagenes = document.getElementById('carrusel_imagenes');
    const carrusel_inner_container = document.getElementById('carrusel_inner_container');
    const file_allow = ["image/jpeg", "image/jpg", "image/png"];
    const container_errors = document.getElementById('errors');
    const TAM_MAX = 6250000 //bytes
    document.getElementById('images').addEventListener('change', (e) => {
        const files = Array.from(e.target.files)
        const validFiles = files.filter(file => {
            if (file.size <= TAM_MAX && file_allow.includes(file.type)) {
                return true;
            } else {
                const p = document.createElement('p');
                p.classList.add("error_message");
                p.textContent = "Imagen no válida: " + file.name + ", se ha ignorado en el carrusel.";
                container_errors.appendChild(p);
                return false;
            }
        })
        if (validFiles.length > 0) {
            validFiles.forEach((file, index) => {
                //file_allow.
                const reader = new FileReader();
                reader.onload = function(event) {
                    const div = document.createElement('div')
                    div.classList.add("carousel-item")
                    if (index == 0) {
                        div.classList.add("active")
                    }
                    div.innerHTML = `<img src="${event.target.result}" class="d-block w-100" alt="${file.name}">`


                    carrusel_inner_container.appendChild(div);
                }
                reader.readAsDataURL(file)

            });

            carrusel_imagenes.style.display = "block";
            const dataTransfer = new DataTransfer();
            validFiles.forEach(file => dataTransfer.items.add(file));
            e.target.files = dataTransfer.files;

        } else {

            alert('Debes subir al menos una imagen!');
        }

        //  e.target.files
    })
</script>

@endsection