<div class="col-lg-6"> <!-- Cambiado a col-lg-6 para dividir la fila en dos columnas -->
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <h2 class="card-title mb-3">Información de {{ $modalidad->nombre_modalidad }}</h2>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif


                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#inputModal">
                    <i class="fas fa-plus"></i> Modificar Información
                </button>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Número de Resolución
                            </th>
                            <td>{{ old('num_resolucion', $acta->num_resolucion ?? 'sin resolución') }}</td>
                        </tr>
                        <tr>
                            <th>Lugar</th>
                            <td>{{ old('lugar', $acta->lugar ?? 'sin información') }}</td>
                        </tr>
                        <tr>
                            <th>Fecha del Acta</th>
                            <td>{{ old('fecha_acta', $acta->fecha_acta ?? 'sin fecha') }}</td>
                        </tr>
                        <tr>
                            <th>Hora de Comienzo</th>
                            <td>{{ old('hora_inicio', $acta->hora_comienzo ?? 'sin hora') }}</td>
                        </tr>
                        <tr>
                            <th>Hora de Fin</th>
                            <td>{{ old('hora_fin', $acta->hora_fin ?? 'sin hora') }}</td>
                        </tr>
                    </tbody>
                </table>


                <!-- Modal -->
                <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="inputModalLabel">Agregar Información</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ route('acta.update', $acta->id_acta) }}" method="POST">
                                    @csrf
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label for="num_resolucion" class="form-label">Número de Resolución</label>
                                                        <input type="text" class="form-control @error('num_resolucion') is-invalid @enderror"
                                                               id="num_resolucion" name="num_resolucion"
                                                               value="{{ old('num_resolucion', $acta->num_resolucion ?? '') }}"
                                                               placeholder="Ingrese el número de resolución">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="lugar" class="form-label">Lugar</label>
                                                        <input type="text" class="form-control @error('lugar') is-invalid @enderror"
                                                               id="lugar" name="lugar"
                                                               value="{{ old('lugar', $acta->lugar ?? '') }}"
                                                               placeholder="Ingrese el lugar">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="fecha_acta" class="form-label">Fecha del Acta</label>
                                                        <input type="date" class="form-control @error('fecha_acta') is-invalid @enderror"
                                                               id="fecha_acta" name="fecha_acta"
                                                               value="{{ old('fecha_acta', $acta->fecha_acta ?? '') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="hora_comienzo" class="form-label">Hora de Comienzo</label>
                                                        <input type="time" class="form-control @error('hora_comienzo') is-invalid @enderror"
                                                               id="hora_comienzo" name="hora_comienzo"
                                                               value="{{ old('hora_comienzo', $acta->hora_comienzo ?? '') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="hora_fin" class="form-label">Hora de Fin</label>
                                                        <input type="time" class="form-control @error('hora_fin') is-invalid @enderror"
                                                               id="hora_fin" name="hora_fin"
                                                               value="{{ old('hora_fin', $acta->hora_fin ?? '') }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
