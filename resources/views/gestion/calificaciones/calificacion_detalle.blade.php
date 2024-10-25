<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Calificaciones {{ $modalidad->nombre_modalidad }}</h4>
                        <p class="card-title-desc">
                            Ingresa las <code>calificaciones</code>
                        </p>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-outline-primary btn-sm" title="Agregar Calificación"
                            data-bs-toggle="modal" data-bs-target="#addCalificacionModal">
                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Defensa</th>
                                <th>Fechas</th>
                                <th>Calificación</th>
                                <th>Valoración</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @php
                            $contador = 0;
                            $suma = 0;
                        @endphp
                        <tbody>
                            @foreach ($calificaciones as $calificacion)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $calificacion->tipo_calificacion }}</td>
                                    <td>{{ $calificacion->fecha }}</td>
                                    <td>{{ $calificacion->calificacion }} {{ $calificacion->calificacion_literal }}
                                    </td>
                                    <td>{{ $calificacion->valoraciones }}</td>
                                    <td>{{ $calificacion->observaciones }}</td>
                                    <td>
                                        <form
                                            action="{{ route('calificaciones.eliminar', $calificacion->id_calificacion) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <!-- Botón para abrir el modal -->
                                        <button class="btn btn-outline-success btn-sm" title="Actualizar"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editCalificacionModal{{ $calificacion->id }}">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php
                                   $suma = $suma + $calificacion->calificacion;
                                @endphp
                                <!-- Modal para Editar Calificación -->
                                <div class="modal fade" id="editCalificacionModal{{ $calificacion->id }}"
                                    tabindex="-1" aria-labelledby="editCalificacionModalLabel{{ $calificacion->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="editCalificacionModalLabel{{ $calificacion->id }}">Editar
                                                    Calificación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('calificaciones.actualizar', $calificacion->id_calificacion) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="tipo_calificacion" class="form-label">Tipo de
                                                            Calificación</label>
                                                        <select class="form-control" name="tipo_calificacion" required>
                                                            <option value="Perfil de trabajo dirigido"
                                                                {{ $calificacion->tipo_calificacion == 'Perfil de trabajo dirigido' ? 'selected' : '' }}>
                                                                Perfil de trabajo dirigido</option>
                                                            <option value="Defensa gran borrador del trabajo dirigido"
                                                                {{ $calificacion->tipo_calificacion == 'Defensa gran borrador del trabajo dirigido' ? 'selected' : '' }}>
                                                                Defensa gran borrador del trabajo dirigido</option>
                                                            <option value="Defensa Final"
                                                                {{ $calificacion->tipo_calificacion == 'Defensa Final' ? 'selected' : '' }}>
                                                                Defensa Final</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fecha" class="form-label">Fecha</label>
                                                        <input type="date" class="form-control" name="fecha"
                                                            value="{{ $calificacion->fecha }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="calificacion"
                                                            class="form-label">Calificación</label>
                                                        <input type="number" class="form-control"
                                                            name="calificacion" placeholder="Ej. 25"
                                                            value="{{ $calificacion->calificacion }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="calificacion_literal"
                                                            class="form-label">Calificación Literal</label>
                                                        <input type="text" class="form-control"
                                                            name="calificacion_literal" placeholder="Ej. Veinticinco"
                                                            value="{{ $calificacion->calificacion_literal }}"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="valoraciones"
                                                            class="form-label">Valoración</label>
                                                        <select class="form-control" name="valoraciones" required>
                                                            <option value="BUENA"
                                                                {{ $calificacion->valoraciones == 'BUENA' ? 'selected' : '' }}>
                                                                BUENA</option>
                                                            <option value="SOBRESALIENTE"
                                                                {{ $calificacion->valoraciones == 'SOBRESALIENTE' ? 'selected' : '' }}>
                                                                SOBRESALIENTE</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="observaciones"
                                                            class="form-label">Observaciones</label>
                                                        <textarea class="form-control" rows="3" name="observaciones" placeholder="Ingrese observaciones adicionales">{{ $calificacion->observaciones }}</textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar
                                                            Calificación</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #f8d7da; color: #721c24;">
                                <th colspan="4" style="text-align: right;">Total Nota:</th>
                                <th>{{  $suma}}/100</th>
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


<!-- Modal para Agregar Nueva Calificación -->
<div class="modal fade" id="addCalificacionModal" tabindex="-1" aria-labelledby="addCalificacionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCalificacionModalLabel">Agregar Calificación de
                    {{ $modalidad->nombre_modalidad }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="calificacionForm" method="POST" action="{{ route('calificaciones.guardar') }}">
                    @csrf <!-- Asegúrate de incluir el token CSRF -->
                    <div class="mb-3">
                        <label for="tipo_calificacion" class="form-label">Tipo de Calificación</label>
                        <select class="form-control" id="tipo_calificacion" name="tipo_calificacion">
                            <option value="Perfil de trabajo dirigido">Perfil de trabajo dirigido</option>
                            <option value="Defensa gran borrador del trabajo dirigido">Defensa gran borrador del
                                trabajo dirigido</option>
                            <option value="Defensa Final">Defensa Final</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificación</label>
                        <input type="number" class="form-control" id="calificacion" name="calificacion"
                            placeholder="Ej. 25">
                    </div>
                    <div class="mb-3">
                        <label for="calificacion_literal" class="form-label">Calificación Literal</label>
                        <input type="text" class="form-control" id="calificacion_literal"
                            name="calificacion_literal" placeholder="Ej. Veinticinco">
                    </div>
                    <div class="mb-3">
                        <label for="valoraciones" class="form-label">Valoración</label>
                        <select class="form-control" id="valoraciones" name="valoraciones">
                            <option value="BUENA">BUENA</option>
                            <option value="SOBRESALIENTE">SOBRESALIENTE</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea class="form-control" id="observaciones" rows="3" name="observaciones"
                            placeholder="Ingrese observaciones adicionales"></textarea>
                    </div>
                    <input type="hidden" class="form-control" id="acta_id" name="acta_id"
                        value="{{ $acta->id_acta }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardarCalificacionBtn">Guardar
                    Calificación</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('guardarCalificacionBtn').addEventListener('click', function() {
        // Obtener valores de los campos del formulario
        var tipoCalificacion = document.getElementById('tipo_calificacion').value;
        var fecha = document.getElementById('fecha').value;
        var calificacionValor = document.getElementById('calificacion').value;
        var calificacionLiteral = document.getElementById('calificacion_literal').value;
        var valoracion = document.getElementById('valoraciones').value;
        var observaciones = document.getElementById('observaciones').value;
        var idActa = document.getElementById('acta_id').value;

        console.log('hola');

        // Enviar solicitud AJAX
        $.ajax({
            url: "{{ route('calificaciones.guardar') }}",
            type: "POST",
            data: {
                tipo_calificacion: tipoCalificacion,
                fecha: fecha,
                calificacion: calificacionValor,
                calificacion_literal: calificacionLiteral,
                valoraciones: valoracion,
                observaciones: observaciones,
                acta_id: idActa,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#addCalificacionModal').modal('hide');
                    // Opcionalmente, recargar la página o actualizar la tabla con la nueva calificación
                    location.reload();
                } else {
                    alert("Ocurrió un error al guardar la calificación.");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert("Error al guardar la calificación.");
            }
        });
    });
</script>
