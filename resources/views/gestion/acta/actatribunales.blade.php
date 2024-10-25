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
                            <form action="{{ route('crear_acta_titulo') }}" method="POST">
                                @csrf
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
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label for="docente_id" class="form-label">TRIBUNALES</label>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#tribunalModal">
                                            <i class="fas fa-plus"></i> Añadir
                                        </button>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Tribunal 1</th>
                                                <td>Nombre completo</td>
                                            </tr>
                                            <tr>
                                                <th>Tribunal 2</th>
                                                <td>Nombre completo</td>
                                            </tr>
                                            <tr>
                                                <th>Tribunal 3</th>
                                                <td>{{ old('fecha_acta', $acta->fecha_acta ?? 'sin fecha') }}</td>
                                            </tr>
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
                            </form>
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
                                <form id="tribunalForm" action="{{route('agregarTribunal')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paterno" class="form-label">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="paterno" name="paterno"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="materno" class="form-label">Apellido Materno</label>
                                        <input type="text" class="form-control" id="materno" name="materno"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="carnet" class="form-label">Carnet</label>
                                        <input type="text" class="form-control" id="carnet" name="carnet"
                                            required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" onclick="agregarTribunal()">Guardar
                                    Tribunal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
