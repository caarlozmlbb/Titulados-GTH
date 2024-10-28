@extends('layouts.master')

@section('title')
    @lang('Tribunales')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Gestion
        @endslot
        @slot('title')
            Tribunales
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="card-title">Lista de Tribunales</h4>
                            <p class="card-title-desc">A continuación se muestran los tribunales registrados.</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTribunalModal">
                                <i class="fas fa-plus"></i> Agregar Nuevo Tribunal
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Rol</th>
                                    <th>CI</th>
                                    <th>Cargo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tribunales as $tribunal)
                                    <tr>
                                        <td>{{ $tribunal->id_tribunal_acta }}</td>
                                        <td>{{ $tribunal->nombre }}</td>
                                        <td>{{ $tribunal->paterno }}</td>
                                        <td>{{ $tribunal->materno }}</td>
                                        <td>{{ $tribunal->rol }}</td>
                                        <td>{{ $tribunal->carnet }}</td>
                                        <td>{{ $tribunal->cargo }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editTribunalModal{{ $tribunal->id_tribunal_acta }}">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteTribunalModal{{ $tribunal->id_tribunal_acta }}">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal para Editar Tribunal -->
                                    <div class="modal fade" id="editTribunalModal{{ $tribunal->id_tribunal_acta }}"
                                        tabindex="-1"
                                        aria-labelledby="editTribunalModalLabel{{ $tribunal->id_tribunal_acta }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="editTribunalModalLabel{{ $tribunal->id_tribunal_acta }}">Editar
                                                        Tribunal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('tribunales.update', $tribunal->id_tribunal_acta) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" name="nombre"
                                                                value="{{ $tribunal->nombre }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="paterno" class="form-label">Apellido
                                                                Paterno</label>
                                                            <input type="text" class="form-control" name="paterno"
                                                                value="{{ $tribunal->paterno }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="materno" class="form-label">Apellido
                                                                Materno</label>
                                                            <input type="text" class="form-control" name="materno"
                                                                value="{{ $tribunal->materno }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="carnet" class="form-label">CI</label>
                                                            <input type="text" class="form-control" name="carnet"
                                                                value="{{ $tribunal->carnet }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="cargo" class="form-label">Cargo</label>
                                                            <input type="text" class="form-control" name="cargo"
                                                                value="{{ $tribunal->cargo }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="rol" class="form-label">Rol</label>
                                                            <input type="text" class="form-control" name="rol"
                                                                value="{{ $tribunal->rol }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar
                                                                Cambios</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal para Confirmar Eliminación -->
                                    <div class="modal fade" id="deleteTribunalModal{{ $tribunal->id_tribunal_acta }}"
                                        tabindex="-1"
                                        aria-labelledby="deleteTribunalModalLabel{{ $tribunal->id_tribunal_acta }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteTribunalModalLabel{{ $tribunal->id_tribunal_acta }}">
                                                        Confirmar Eliminación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas eliminar al tribunal
                                                    <strong>{{ $tribunal->nombre }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <form method="POST"
                                                        action="{{ route('tribunales.destroy', $tribunal->id_tribunal_acta) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar
                                                            Tribunal</button>
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

    <!-- Modal para Agregar Nuevo Tribunal -->
    <div class="modal fade" id="addTribunalModal" tabindex="-1" aria-labelledby="addTribunalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTribunalModalLabel">Agregar Nuevo Tribunal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tribunales.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="paterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="paterno" required>
                        </div>
                        <div class="mb-3">
                            <label for="materno" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="materno" required>
                        </div>
                        <div class="mb-3">
                            <label for="carnet" class="form-label">CI</label>
                            <input type="text" class="form-control" name="carnet" required>
                        </div>
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo</label>
                            <input type="text" class="form-control" name="cargo">
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <input type="text" class="form-control" name="rol">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Tribunal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
