@extends('layouts.app')

@section('content')
<style>
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
        padding: 5px 10px;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s
    }
</style>
<div class="container">
    <div class="row mt-4">

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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

        <div class="col-12">
            <h1>Configuración</h1>
        </div>

        <div class="col-12 col-md-8 m-auto mt-4">
            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $settings?->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="email_contact" class="form-label">Email de contacto</label>
                    <input type="email" name="email_contact" id="email_contact" class="form-control" value="{{ old('email_contact', $settings?->email_contact) }}">
                </div>

                <div class="mb-3">
                    <label for="phone_contact" class="form-label">Teléfono de contacto</label>
                    <input type="text" name="phone_contact" id="phone_contact" class="form-control" value="{{ old('phone_contact', $settings?->phone_contact) }}">
                </div>

                <div class="mb-3">
                    <label for="url_instagram" class="form-label">URL Instagram</label>
                    <input type="url" name="url_instagram" id="url_instagram" class="form-control" value="{{ old('url_instagram', $settings?->url_instagram) }}">
                </div>

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
                        <i class="bi bi-upload"></i> Seleccionar imágenes carrusel
                    </label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*">
                </div>

                <div class="mx-auto text-center mt-4">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
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
    document.getElementById('images').addEventListener('change', (e) => {
        const files = Array.from(e.target.files)

         if (files.length > 10) {
            alert("Como maximo puedes subir 10 imágenes");
        } else { 
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
            }
        }

    })
</script>
@endsection