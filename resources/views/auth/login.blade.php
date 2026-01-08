@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 480px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="text-center mb-4">{{ __('Log in') }}</h4>

            {{-- Mensaje de sesión --}}
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="current-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember_me"
                    >
                    <label class="form-check-label" for="remember_me">
                        Recordar
                    </label>
                </div>

                {{-- Acciones --}}
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection