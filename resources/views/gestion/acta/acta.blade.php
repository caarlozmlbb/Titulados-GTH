@extends('layouts.master')
@section('title')
    @lang('translation.Chat')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Apps
        @endslot
        @slot('title')
            Crear acta Estudiante: {{ $estudiante->nombre }} {{ $estudiante->paterno }} {{ $estudiante->materno }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h4 class="card-title mb-3">
                                <i class="fas fa-info-circle me-2"></i> Información de {{ $modalidad->nombre_modalidad }}
                            </h4>
                            @if (session('success'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <form action="{{ route('crear_acta_titulo') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="titulo" class="form-label">
                                                    <i class="fas fa-book-open me-2"></i> Título del Trabajo Dirigido
                                                </label>
                                                @if (empty($acta->titulo))
                                                    <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                                        id="titulo" name="titulo"
                                                        value="{{ old('titulo', $acta->titulo ?? '') }}"
                                                        placeholder="Ingrese el título del trabajo dirigido">
                                                    <input type="hidden" name="estudiante_id"
                                                        value="{{ $estudiante->id_estudiante }}">
                                                    <input type="hidden" name="id_modalidad" value="{{ $id_modalidad }}">
                                                    @error('titulo')
                                                        <div class="invalid-feedback">
                                                            <i class="fas fa-exclamation-triangle me-2"></i> {{ $message }}
                                                        </div>
                                                    @enderror
                                                @elseif (!empty($acta->titulo))
                                                    <h1 class="text-center">
                                                        <i class="fas fa-graduation-cap me-2"></i> {{ $acta->titulo }}
                                                    </h1>
                                                @endif
                                            </div>

                                            @if (empty($acta->titulo))
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-plus me-2"></i> Agregar
                                                    </button>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if (!empty($acta->titulo))
            @include('gestion.acta.actatribunales')
        @endif

        @if (!empty($acta->titulo))
            @include('gestion.acta.actaInformacion')
        @endif
    </div>

    @if (!empty($acta->titulo))
        @include('gestion.calificaciones.calificacion_detalle')
    @endif
@endsection
