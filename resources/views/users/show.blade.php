@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4 mb-4">
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
        <div class="col-12">
            <h1> Mi perfil de usuario</h1>
        </div>
        <div class="col-12 col-md-6 m-auto mt-4">
           <form action="{{ route('user.update') }}" method="post">
            @csrf
                
                <input type="hidden" name="id" value="{{$user->id}}">
             
                <div class="mb-3">
                    <label for="rol_id" class="form-label">Rol</label>
                    <select @if(!\App\Http\Helpers\UsersHelper::checkAdmin()) disabled @endif required name="rol_id" id="rol_id" class="form-select" required>
                    <option value="">Seleccionar rol</option>
                        @foreach($roles as $rol)
                            <option 
                                value="{{ $rol->id }}" 
                                {{($user->rol_id == $rol->id) ? 'selected' : '' }}>
                                {{ $rol->rol }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" required class="form-control" id="name" value="{{ $user->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" required class="form-control" id="email" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                    <small>Solo si desea cambiarla</small>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confrimar nueva contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="">
                </div>
                
                <div class="mb-3 text-center">
                     <button class="btn btn-submit" type="submit">Guardar</button>
                </div>
           </form>
        </div>
    </div>
</div>

@endsection