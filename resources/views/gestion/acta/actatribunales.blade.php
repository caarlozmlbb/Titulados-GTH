<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <h4 class="card-title mb-3">Información de Docente y Tribunal</h4>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="d-flex align-items-center mb-2">
                                <label for="docente_id" class="form-label me-3 mb-0">DOCENTE</label>
                                <div class="flex-grow-1 me-3">
                                    <select class="form-control @error('docente_id') is-invalid @enderror"
                                        id="docente_id" name="docente_id">
                                        <option value="">Seleccione Tutor</option>
                                        @foreach ($docentes as $docente)
                                            <option value="{{ $docente->id_docente }}">
                                                {{ $docente->nombre }} {{ $docente->paterno }}
                                                {{ $docente->materno }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" id="id_acta" name="id_acta" required
                                    value="{{ $acta->id_acta }}">
                                <!-- Botón para añadir -->
                                <button type="button" class="btn btn-secondary">
                                    <i class="fas fa-plus"></i> Añadir tutor
                                </button>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                    @foreach ($nombresDocentes as $docente)
                                    <tr>
                                        <th>Tutor</th>
                                        <td>{{$docente->nombre}} {{$docente->paterno}} {{$docente->materno}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @csrf
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- Etiqueta para Tribunales -->
                                    <label for="docents_id" class="form-label me-3 mb-0">TRIBUNALES</label>

                                    <!-- Botón para añadir, alineado a la derecha -->
                                    <button type="button" class="btn btn-secondary ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#tribunalModal">
                                        <i class="fas fa-plus"></i> Añadir Tribunal
                                    </button>
                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rol</th>
                                            <th>Cargo</th>
                                            <th>Nombre Completo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $tribunalCount = count($nombresTribunales);
                                        @endphp

                                        @for ($i = 0; $i < 4; $i++)
                                            <tr>
                                                <th>{{ $tribunalCount > $i ? $rolesTribunales[$i] : 'sin dato' }}</th>
                                                <td>{{ $tribunalCount > $i ? $cargosTribunales[$i] : 'sin dato' }}</td>
                                                <td>{{ $tribunalCount > $i ? $nombresTribunales[$i]->nombre_completo : 'sin dato' }}</td>
                                                <td>
                                                    @if ($tribunalCount > $i)
                                                        {{-- Formulario para eliminar --}}
                                                        <form action="" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                    title="Eliminar"
                                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                        {{-- Botón para abrir el modal de actualización --}}
                                                        <button class="btn btn-outline-success btn-sm"
                                                                title="Actualizar" data-bs-toggle="modal"
                                                                data-bs-target="#editCalificacionModal">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </button>
                                                    @else
                                                        <span class="text-muted">No disponible</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>

                            </div>
                            @if (empty($acta->titulo))
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-plus"></i> Agregar docente
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal para Agregar Tribunal -->
                <div class="modal fade" id="tribunalModal" tabindex="-1" aria-labelledby="tribunalModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tribunalModalLabel">Agregar Tribunal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <form id="tribunalForm" action="{{ route('agregarTribunalActa') }}" method="POST">
                                    @csrf

                                    <!-- Selección de Tribunal -->
                                    <div class="mb-3">
                                        <label for="id_tribunal_acta" class="form-label">Seleccione Tribunal</label>
                                        <select class="form-control @error('id_tribunal_acta') is-invalid @enderror"
                                            id="id_tribunal_acta" name="id_tribunal_acta">
                                            <option value="">Seleccione Tribunal</option>
                                            @foreach ($tribunales as $tribunal)
                                                <option value="{{ $tribunal->id_tribunal_acta }}">
                                                    {{ $tribunal->nombre }} {{ $tribunal->paterno }}
                                                    {{ $tribunal->materno }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Selección de Rol -->
                                    <div class="mb-3">
                                        <label for="rol" class="form-label">Rol</label>
                                        <select class="form-control @error('rol') is-invalid @enderror" id="rol"
                                            name="rol">
                                            <option value="">Seleccione Cargo</option>
                                            <option value="PRESIDENTE">PRESIDENTE</option>
                                            <option value="TRIBUNAL">TRIBUNAL</option>
                                        </select>
                                    </div>
                                    <input type="hidden" class="form-control" id="id_acta" name="id_acta" required
                                        value="{{ $acta->id_acta }}">

                                    <!-- Botón para enviar -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Evento para el botón "Añadir"
        $('button').click(function() {
            var docenteId = $('#docente_id').val();
            var actaId = $('#id_acta').val(); // Obtener el id_acta desde el campo oculto

            if (docenteId && actaId) {
                $.ajax({
                    url: '/insertar-tutor',
                    type: 'POST',
                    data: {
                        docente_id: docenteId,
                        id_acta: actaId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log("Tutor añadido correctamente. ID Tutor Acta:", response
                            .id_tutor_acta);
                        alert(response.success);
                    },
                    error: function(xhr) {
                        alert('Error al añadir el tutor o actualizar el acta.');
                        console.log(xhr.responseText);
                    }
                });

            }
        });
    });
</script>
