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
            <h1> @if(isset($service))Editar @else Crear @endif Service </h1>
        </div>
        <div class="col-12 col-md-6 m-auto mt-4">
           <form action=" @if(isset($service)) {{ route('service.update') }} @else {{ route('service.store') }} @endif " method="post">
               @csrf
                @if(isset($service))
                    <input type="hidden" name="id" value="{{$service->id}}">
                @endif
                <div class="mb-3">
                    <label for="service" class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" id="service" value="{{ isset($service) ? $service->title : '' }}">
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control" >{{ isset($service) ? $service->description : ''}}</textarea>
                </div>
                 <div class="mb-3 text-center">
                        <button class="btn btn-submit" type="submit">Guardar</button>
                </div>
               
           </form>
        </div>
    </div>
</div>

@endsection