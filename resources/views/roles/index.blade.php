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
            <h1>Roles</h1>
        </div>
        <div class="col-12 col-md-12" style="text-align:center">
             <a class="btn btn-edit" href="{{ route('rol.create.edit') }}">
                                Nuevo rol
             </a>
        </div>
        <div class="col-12 col-md-6 m-auto">
            <table class="table caption-top">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                    <tr>
                        <td>{{$rol->id}}</td>
                        <td>{{$rol->rol}}</td>
                        <td>
                            <a class="btn btn-edit" href="{{ route('rol.create.edit',$rol->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-delete" onclick="return confirm('¿Quieres borrar este rol?')" href="{{ route('rol.delete',$rol->id) }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                   @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection