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
            Modalidades de Titulación
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="card-title">Lista de Modalidades</h4>
                            <p class="card-title-desc">A continuación se muestran las Modalidades de Titulación registrados.
                            </p>
                        </div>
                        <div>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addModalidadModal">
                                <i class="fas fa-plus"></i> Agregar Nueva Modalidad
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Modalidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $contador = 1;
                            @endphp
                                @foreach ($modalidades as $modalidad)
                                    <tr>
                                        <td>{{ $contador++ }}</td>
                                        <td>{{ $modalidad->nombre_modalidad }}</td>
                                        <td>
                                            <!-- Botón para Editar -->
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModalidadModal{{ $modalidad->id_modalidad }}" title="Editar">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </button>

                                            <!-- Botón para Eliminar -->
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModalidadModal{{ $modalidad->id_modalidad }}" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal para Editar Modalidad -->
                                    <div class="modal fade" id="editModalidadModal{{ $modalidad->id_modalidad }}" tabindex="-1"
                                        aria-labelledby="editModalidadModalLabel{{ $modalidad->id_modalidad }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalidadModalLabel{{ $modalidad->id_modalidad }}">Editar Modalidad</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editModalidadForm{{ $modalidad->id_modalidad }}" method="POST" action="{{ route('modalidades.update', $modalidad->id_modalidad) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="edit_nombre_modalidad" class="form-label">Nombre Modalidad</label>
                                                            <input type="text" class="form-control" name="nombre_modalidad" value="{{ $modalidad->nombre_modalidad }}" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para Confirmar Eliminación -->
                                    <div class="modal fade" id="deleteModalidadModal{{ $modalidad->id_modalidad }}" tabindex="-1"
                                        aria-labelledby="deleteModalidadModalLabel{{ $modalidad->id_modalidad }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalidadModalLabel{{ $modalidad->id_modalidad }}">Confirmar Eliminación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas eliminar la modalidad <strong>{{ $modalidad->nombre_modalidad }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form method="POST" action="{{ route('modalidades.destroy', $modalidad->id_modalidad) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar Modalidad</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- Modal para Agregar Nueva Modalidad -->
    <div class="modal fade" id="addModalidadModal" tabindex="-1" aria-labelledby="addModalidadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalidadModalLabel">Agregar Nueva Modalidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="modalidadForm" method="POST" action="{{ route('modalidades.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre_modalidad" class="form-label">Nombre Modalidad</label>
                            <input type="text" class="form-control" name="nombre_modalidad" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="guardarModalidad">Guardar Modalidad</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Modalidad -->
    <div class="modal fade" id="editModalidadModal" tabindex="-1" aria-labelledby="editModalidadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalidadModalLabel">Editar Modalidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editModalidadForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_nombre_modalidad" class="form-label">Nombre Modalidad</label>
                            <input type="text" class="form-control" name="nombre_modalidad" required
                                id="edit_nombre_modalidad">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="guardarEditModalidad">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger" id="eliminarModalidad">Eliminar Modalidad</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Enviar el formulario al hacer clic en el botón "Guardar Modalidad"
        document.getElementById('guardarModalidad').addEventListener('click', function() {
            document.getElementById('modalidadForm').submit();
        });
    </script>
@endsection
