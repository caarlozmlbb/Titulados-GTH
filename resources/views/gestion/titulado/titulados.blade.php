@extends('layouts.master')
@section('title')
    @lang('translation.Calificaciones')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Apps
        @endslot
        @slot('title')
            Calificaciones
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buscador de Estudiantes</h4>
                    <form>
                        <div class="row align-items-end">

                            <!-- Columna para el campo de búsqueda -->
                            <div class="col-sm-6 mb-3">
                                <label for="example-search-input" class="form-label">Buscar</label>
                                <input class="form-control" type="search" placeholder="Buscar estudiante..." id="example-search-input">
                            </div>

                            <!-- Columna para el Seleccionar -->
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Seleccionar Categoría</label>
                                <select class="form-control select2-search-disable">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="Academico">Académico</option>
                                    <option value="Inscripcion">Inscripción</option>
                                    <option value="Condiciones">Condiciones</option>
                                </select>
                            </div>

                            <!-- Columna para el botón -->
                            <div class="col-sm-2 mb-3">
                                <button type="button" class="btn btn-outline-primary waves-effect waves-light">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="card-title">Lista de Estudiantes</h4>
                            <p class="card-title-desc">A continuación se muestran los estudiantes registrados.</p>
                        </div>
                        <div>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCalificacionModal">
                                <i class="fas fa-plus"></i> Agregar Nuevo Estudiante
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Paterno</th>
                                    <th>Materno</th>
                                    <th>Carnet</th>
                                    <th>R.U.</th>
                                    <th>Carrera</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $estudiante->id_estudiante }}</td>
                                        <td>{{ $estudiante->nombre }}</td>
                                        <td>{{ $estudiante->paterno }}</td>
                                        <td>{{ $estudiante->materno }}</td>
                                        <td>{{ $estudiante->ci }}</td>
                                        <td>{{ $estudiante->ru }}</td>
                                        <td>{{ $estudiante->carrera }}</td>
                                        <td>
                                            <!-- Botón para Editar -->
                                            <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Botón para Eliminar -->
                                            <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <!-- Botón para Actualizar -->
                                            <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- Modal para Agregar Nueva Calificación -->
    <div class="modal fade" id="addCalificacionModal" tabindex="-1" aria-labelledby="addCalificacionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCalificacionModalLabel">Agregar Nueva Calificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="tipoCalificacion" class="form-label">Tipo de Calificación</label>
                            <select class="form-control" id="tipoCalificacion">
                                <option value="Perfil">Perfil</option>
                                <option value="Defensa Borrador">Defensa Borrador</option>
                                <option value="Defensa Final">Defensa Final</option>
                                <option value="Examen Escrito">Examen Escrito</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="calificacionFecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="calificacionFecha">
                        </div>
                        <div class="mb-3">
                            <label for="calificacionValor" class="form-label">Calificación</label>
                            <input type="number" class="form-control" id="calificacionValor" placeholder="Ej. 85">
                        </div>
                        <div class="mb-3">
                            <label for="calificacionLiteral" class="form-label">Calificación Literal</label>
                            <input type="text" class="form-control" id="calificacionLiteral" placeholder="Ej. Ochenta y cinco">
                        </div>
                        <div class="mb-3">
                            <label for="calificacionObservaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="calificacionObservaciones" rows="3" placeholder="Ingrese observaciones adicionales"></textarea>
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
