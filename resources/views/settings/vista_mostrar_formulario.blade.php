@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-12">
            <h1>Configuración</h1>
        </div>

        <div class="col-12 col-md-8 m-auto mt-4">
            <form action="{{ route('setting.update') }}" method="POST">
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

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>

    </div>
</div>
@endsection