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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="card-title mb-3">Información de {{$modalidad->nombre_modalidad}}</h4>
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
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <label for="titulo" class="form-label">Título del Trabajo Dirigido</label>
                                                <input type="text"
                                                    class="form-control @error('titulo') is-invalid @enderror"
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
                                            <div class="col-md-4">
                                                <label for="docente_id" class="form-label">Seleccione Docente</label>
                                                <select class="form-control @error('docente_id') is-invalid @enderror" id="docente_id" name="docente_id">
                                                    <option value="">Seleccione un docente</option>
                                                    @foreach ($docentes as $docente)
                                                        <option value="{{ $docente->id_docente }}" {{ old('docente_id', $acta->tutor_acta_id ?? '') == $docente->id_docente ? 'selected' : '' }}>
                                                            {{ $docente->nombre }} {{ $docente->paterno }} {{ $docente->materno }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('docente_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <label for="docente_id" class="form-label">Seleccione Tribunal</label>
                                                <select class="form-control @error('docente_id') is-invalid @enderror" id="docente_id" name="docente_id">
                                                    <option value="">Seleccione un docente</option>
                                                    @foreach ($docentes as $docente)
                                                        <option value="{{ $docente->id_docente }}" {{ old('docente_id', $acta->tutor_acta_id ?? '') == $docente->id_docente ? 'selected' : '' }}>
                                                            {{ $docente->nombre }} {{ $docente->paterno }} {{ $docente->materno }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('docente_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            <div class="col-md-2">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <i class="fas fa-plus"></i> Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Calificaciones Trabajo Dirigido</h4>
                    <p class="card-title-desc">
                        Ingresa las <code>calificaciones</code>
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Agregar</th>
                                    <th>Defensa</th>
                                    <th>Fechas</th>
                                    <th>Calificación</th>
                                    <th>Valoración</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Filas de calificaciones existentes -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <a href="" type="button" class="btn btn-outline-primary btn-sm edit"
                                            data-bs-toggle="modal" data-bs-target="#addCalificacionModal" title="Editar">
                                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                                        </a>
                                    </td>
                                    <td>Perfil de trabajo dirigido</td>
                                    <td>15 de septiembre de 2023</td>
                                    <td>0/20</td>
                                    <td>Aprobado</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                                        </a>
                                    </td>
                                    <td>Defensa gran borrador del trabajo dirigido</td>
                                    <td>24 de noviembre de 2023</td>
                                    <td>0/30</td>
                                    <td>Aprobado</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                                        </a>
                                    </td>
                                    <td>Defensa Final</td>
                                    <td>11 de marzo de 2024</td>
                                    <td>0/50</td>
                                    <td>Aprobado</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #f8d7da; color: #721c24;">
                                    <th colspan="4" style="text-align: right;">Total Nota:</th>
                                    <th>76/100</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tribunales</h4>
                    <p class="card-title-desc">Use one of two modifier classes to make <code>&lt;thead&gt;</code>s appear
                        light or dark gray.</p>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped rows</h4>
                    <p class="card-title-desc">Use <code>.table-striped</code> to add zebra-striping to any table row
                        within
                        the <code>&lt;tbody&gt;</code>.</p>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Modal para Agregar Nueva Calificación -->
    <div class="modal fade" id="addCalificacionModal" tabindex="-1" aria-labelledby="addCalificacionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCalificacionModalLabel">Agregar Calificacion de Perfil de trabajo
                        dirigido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="calificacionFecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="calificacionFecha">
                        </div>
                        <div class="mb-3">
                            <label for="calificacionValor" class="form-label">Calificación</label>
                            <input type="number" class="form-control" id="calificacionValor" placeholder="Ej. 25">
                        </div>
                        <div class="mb-3">
                            <label for="calificacionLiteral" class="form-label">Calificación Literal</label>
                            <input type="text" class="form-control" id="calificacionLiteral"
                                placeholder="Ej. Veinticinco">
                        </div>
                        <div class="mb-3">
                            <label for="tipoCalificacion" class="form-label">Tipo de Calificación</label>
                            <select class="form-control" id="tipoCalificacion">
                                <option value="Defensa Borrador">Aprobado</option>
                                <option value="Defensa Final">Reprobado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="calificacionObservaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="calificacionObservaciones" rows="3"
                                placeholder="Ingrese observaciones adicionales"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Calificación</button>
                </div>
            </div>
        </div>
    </div>
@endsection
