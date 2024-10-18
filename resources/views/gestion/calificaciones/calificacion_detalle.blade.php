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
            Calificaciones
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buscador Estudiantes</h4>
                    <form method>
                        <div class="row align-items-end">
                            <!-- Columna para el Seleccionar -->
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label class="form-label">Seleccionar Modalidad</label>
                                <select class="form-control select2-search-disable">
                                    <option>Seleccionar</option>
                                    <optgroup label="Modalidades">
                                        <option value="Academico">Trabajo Dirigido</option>
                                        <option value="Inscripcion">Examen de Grado</option>
                                        <option value="Condiciones">Excelencia Académica</option>
                                        <option value="Condiciones">Proyecto de Grado</option>
                                        <option value="Condiciones">Tesis de Grado</option>
                                    </optgroup>
                                </select>
                            </div>
                            <!-- Columna para el campo de búsqueda -->
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="example-search-input" class="form-label">Numero de carnet</label>
                                <input class="form-control" type="search" placeholder="Carnet Estudiante..." id="example-search-input">
                            </div>
                            <!-- Columna para el botón -->
                            <div class="col-lg-2 col-md-2 mb-3">
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
                            <h4 class="card-title">Lista de Calificaciones</h4>
                            <p class="card-title-desc">A continuación se muestran las calificaciones registradas.</p>
                        </div>
                        <div>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCalificacionModal">
                                <i class="fas fa-plus"></i> Agregar Nueva Calificación
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Acta</th>
                                    <th>Tipo de Calificación</th>
                                    <th>Fecha</th>
                                    <th>Calificación</th>
                                    <th>Calificación Literal</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calificaciones as $calificacion)
                                    <tr>
                                        <td style="width: 80px">{{ $calificacion->id_calificacion }}</td>
                                        <td style="width: 80px">{{ $calificacion->acta_id }}</td>
                                        <td>{{ $calificacion->tipo_calificacion }}</td>
                                        <td>{{ $calificacion->fecha }}</td>
                                        <td>{{ $calificacion->calificacion }}</td>
                                        <td>{{ $calificacion->calificacion_literal }}</td>
                                        <td>{{ $calificacion->observaciones }}</td>
                                        <td style="width: 100px">
                                            <!-- Botón para Editar -->
                                            <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Botón para Eliminar -->
                                            <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
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
