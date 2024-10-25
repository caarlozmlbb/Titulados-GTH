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
        <div class="col-lg-6"> <!-- Cambiado a col-lg-6 para dividir la fila en dos columnas -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="card-title mb-3">Información de {{ $modalidad->nombre_modalidad }}</h4>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form action="{{ route('crear_acta_titulo') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="titulo" class="form-label">Título del Trabajo Dirigido</label>
                                            <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                                id="titulo" name="titulo"
                                                value="{{ old('titulo', $acta->titulo ?? '') }}"
                                                placeholder="Ingrese el título del trabajo dirigido">
                                            <input type="hidden" name="estudiante_id"
                                                value="{{ $estudiante->id_estudiante }}">
                                            <input type="hidden" name="id_modalidad" value="{{ $id_modalidad }}">
                                            @error('titulo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="docente_id" class="form-label">Seleccione Docente</label>
                                            <select class="form-control @error('docente_id') is-invalid @enderror"
                                                id="docente_id" name="docente_id">
                                                <option value="">Seleccione un docente</option>
                                                @foreach ($docentes as $docente)
                                                    <option value="{{ $docente->id_docente }}"
                                                        {{ old('docente_id', $acta->tutor_acta_id ?? '') == $docente->id_docente ? 'selected' : '' }}>
                                                        {{ $docente->nombre }} {{ $docente->paterno }}
                                                        {{ $docente->materno }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('docente_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

         @include('gestion.acta.actaInformacion')
    </div>


    @include('gestion.calificaciones.calificacion_detalle')
@endsection
