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
            <h1>Usuarios</h1>
        </div>
        <div class="col-12 col-md-12" style="text-align:center">
             <a class="btn btn-edit" href="{{ route('user.create.edit') }}">
                                Nuevo Usuario
             </a>
        </div>
        <div class="col-12">
            <table class="table caption-top" id="tablaUsuarios">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Fecha de registro</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->rol->rol}}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i:s')}}</td>
                        <td>
                            <a class="btn btn-edit" href="{{ route('user.create.edit',$user->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-delete" onclick="return confirm('¿Quieres borrar este usuario?')" href="{{ route('user.delete',$user->id) }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                   @endforeach
                   
                </tbody>
            </table>
            <div class="d-flex justify-content-center mb-4" >
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
         
             new DataTable('#tablaUsuarios', {
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