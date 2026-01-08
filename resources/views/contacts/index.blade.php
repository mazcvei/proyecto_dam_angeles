@extends('layouts.app')

@section('content')
<style>
    .cell_message {
        text-align: start;
    }

    #content_message {
        overflow: auto;
    }
</style>
<div class="container">
    <div class="row mt-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="col-12">
            <h1>Contactos</h1>
        </div>

        <div class="col-12 col-md-12 m-auto">
            <div class="table-responsive">
                <table class="table table-responsive caption-top" id="tablaContactos">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Mensaje</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->phone}}</td>
                            <td class="w-25 cell_message">{{Str::limit($contact->message,100) }}</td>
                            <td>30-12-2025 18:52:00</td>
                            <td>
                                <button class="btn btn-show" data-bs-toggle="modal" data-bs-target="#contactDetailModal" data-message="{{ $contact->message }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                @if(\App\Http\Helpers\UsersHelper::checkAdmin())
                                <a class="btn btn-delete" onclick="return confirm('¿Quieres borrar este correo?')" href="{{ route('contact.delete',$contact->id) }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mb-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="contactDetailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label fw-bold">Mensaje:</label>

                <p class="form-label mt-3" id="content_message">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Aliquid ducimus quas beatae laboriosam, ea harum repellat facere dicta.
                    Possimus dolore quam nisi natus, magnam ad porro ipsam minima quibusdam eum?
                </p>

            </div>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" aria-label="Close" class="btn btn-success">Cerrar</button>
            </div>
        </div>

    </div>
</div>


@endsection
@section('script')
<script>
    new DataTable('#tablaContactos', {
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
    const buttons_show_message = document.getElementsByClassName("btn-show");
    const text_message_show = document.getElementById("content_message")
    
    for (elem of buttons_show_message) {
        elem.addEventListener("click", function() {
            const message = this.getAttribute("data-message");
            text_message_show.textContent = message;
        });

    }
</script>
@endsection