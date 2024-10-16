@extends('layouts.master')

@section('title')
    Configuración de Cuenta
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Mensaje de éxito -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Card para cambiar la contraseña -->
                <div class="card mb-4">
                    <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- Campo para Contraseña Actual -->
                            <div class="mb-3">
                                <label for="current_password">{{ __('Contraseña Actual') }}</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para Nueva Contraseña -->
                            <div class="mb-3">
                                <label for="new_password">{{ __('Nueva Contraseña') }}</label>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para Confirmar Nueva Contraseña -->
                            <div class="mb-3">
                                <label for="new_password_confirmation">{{ __('Confirmar Nueva Contraseña') }}</label>
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Actualizar Contraseña') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Card para actualizar nombre y correo electrónico -->
                <div class="card">
                    <div class="card-header">{{ __('Actualizar Información') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('info.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- Campo para Nombre -->
                            <div class="mb-3">
                                <label for="name">{{ __('Nombre') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para Correo Electrónico -->
                            <div class="mb-3">
                                <label for="email">{{ __('Correo Electrónico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Actualizar Información') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
