@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4">
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
            <h1> @if(isset($user))Editar @else Crear @endif Usuario </h1>
        </div>
        <div class="col-12 col-md-6 m-auto mt-4">
           <form action=" @if(isset($user)) {{ route('user.update') }} @else {{ route('user.store') }} @endif " method="post">
            @csrf
                @if(isset($user))
                    <input type="hidden" name="id" value="{{$user->id}}">
                @endif
            
                <div class="mb-3">
                    <label for="rol_id" class="form-label">Rol</label>
                    <select 
                      name="rol_id" id="rol_id" class="form-select" required>
                    <option value="">Seleccionar rol</option>
                        @foreach($roles as $rol)
                            <option 
                                value="{{ $rol->id }}" 
                                {{ (isset($user) && $user->rol_id == $rol->id) ? 'selected' : '' }}>
                                {{ $rol->rol }}
                            </option>
                        @endforeach
                    </select>
                </div>
         
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" required class="form-control" id="name" value="{{ isset($user) ? $user->name : '' }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" required class="form-control" id="email" value="{{ isset($user) ? $user->email : '' }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confrimar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="">
                </div>
                <div class="mb-3 center">
                     <button class="btn btn-submit" type="submit">Guardar</button>
                </div>
               
           </form>
        </div>
    </div>
</div>

@endsection