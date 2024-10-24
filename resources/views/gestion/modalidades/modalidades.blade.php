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
                            <p class="card-title-desc">A continuación se muestran las Modalidades de Titulación registrados.</p>
                        </div>
                        <div>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalidadModal">
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
                                @foreach ($modalidades as $modalidad)
                                    <tr>
                                        <td>{{ $modalidad->id_modalidad }}</td>
                                        <td>{{ $modalidad->nombre_modalidad }}</td>
                                        <td>
                                            <!-- Botón para Editar -->
                                            <a href="#" class="btn btn-outline-primary btn-sm edit-modalidad" data-id="{{ $modalidad->id_modalidad }}" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModalidadModal">
                                                <i class="fas fa-trash-alt"></i> Editar Modalidad
                                            </button>

                                            <!-- Botón para Eliminar -->
                                            <a href="#" class="btn btn-outline-danger btn-sm delete-modalidad" data-id="{{ $modalidad->id_modalidad }}" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModalidadModal">
                                                <i class="fas fa-trash-alt"></i> Editar Modalidad
                                            </button>
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

    <!-- Modal para Agregar Nueva Modalidad -->
    <div class="modal fade" id="addModalidadModal" tabindex="-1" aria-labelledby="addModalidadModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="editModalidadModal" tabindex="-1" aria-labelledby="editModalidadModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" name="nombre_modalidad" required id="edit_nombre_modalidad">
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

        // Manejo de edición
        $(document).on('click', '.edit-modalidad', function() {
            let id = $(this).data('id');
            $.get('/modalidades/' + id + '/edit', function(data) {
                $('#edit_nombre_modalidad').val(data.nombre_modalidad);
                $('#editModalidadForm').attr('action', '/modalidades/' + id);
                $('#editModalidadModal').modal('show');
            });
        });

        // Enviar el formulario de edición
        $('#guardarEditModalidad').on('click', function() {
            $('#editModalidadForm').submit();
        });

        // Manejo de eliminación
        $('#eliminarModalidad').on('click', function() {
            let id = $('#editModalidadForm').attr('action').split('/').pop();
            if (confirm('¿Estás seguro de que deseas eliminar esta modalidad?')) {
                $.ajax({
                    url: '/modalidades/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        $('#editModalidadModal').modal('hide');
                        location.reload();
                    },
                    error: function() {
                        alert('Error al eliminar la modalidad. Inténtalo de nuevo.');
                    }
                });
            }
        });
    </script>
@endsection
