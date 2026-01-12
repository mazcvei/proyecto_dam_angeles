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
            <h1> @if(isset($rol))Editar @else Crear @endif Rol </h1>
        </div>
        <div class="col-12 col-md-6 m-auto mt-4">
           <form action=" @if(isset($rol)) {{ route('rol.update') }} @else {{ route('rol.store') }} @endif " method="post">
               @csrf
                @if(isset($rol))
                    <input type="hidden" name="id" value="{{$rol->id}}">
                @endif
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <input type="text" name="rol" class="form-control" id="rol" value="{{ isset($rol) ? $rol->rol : '' }}">
                </div>
                 <div class="mb-3 text-center">
                        <button class="btn btn-submit" type="submit">Guardar</button>
                </div>
  
           </form>
        </div>
    </div>
</div>

@endsection