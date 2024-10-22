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
            Tesis de grado
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buscar de Estudiantes</h4>
                    <form method="GET">
                        <div class="row align-items-end">
                            {{-- <!-- Columna para el Seleccionar -->
                            <div class="col-lg-3 col-md-4 mb-3">
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
                            </div> --}}

                            <!-- Campo para ingresar el Número de Carnet -->
                            <div class="col-lg-3 col-md-4 mb-3">
                                <label for="carnet" class="form-label">Número de carnet</label>
                                <input class="form-control" type="search" placeholder="Carnet Estudiante..."
                                    id="carnet"name="carnet" required>
                            </div>

                            <div class="col-lg-2 col-md-2 mb-3">
                                <button type="submit" class="btn btn-outline-primary waves-effect waves-light"
                                    id="btnBuscar">Buscar</button>
                            </div>


                            <!-- Campo para mostrar el nombre del estudiante -->
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label for="nombre-estudiante-input" class="form-label">Nombre del Estudiante</label>
                                <input type="text" class="form-control" id="nombre-estudiante-input"
                                    name="nombre-estudiante-input" readonly>
                            </div>
                            @if (session('error'))
                                <div id="mensaje" class="text-danger mt-2">{{ session('error') }}</div>
                            @elseif (session('success'))
                                <div id="mensajeexito" class="text-success mt-2">{{ session('success') }}</div>
                            @else
                                <div id="mensaje" class="text-danger mt-2" style="display: none;"></div>
                                <div id="mensajeexito" class="text-success mt-2" style="display: none;"></div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('script')

    <script>
        $(document).ready(function() {
            $('#btnBuscar').on('click', function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                var carnet = $('#carnet').val(); // Captura el valor del campo de entrada
                console.log('Pasa aquí'); // Asegúrate de que esto se imprima en la consola

                if (carnet.length > 0) {
                    $.ajax({
                        url: '/buscar-estudiante',
                        method: 'GET',
                        data: {
                            ci: carnet // Enviar el carnet como parámetro
                        },
                        success: function(response) {
                            console.log('Respuesta del servidor:',
                                response); // Imprime la respuesta
                            if (response.success) {
                                var nombreCompleto =
                                    `${response.nombre} ${response.paterno} ${response.materno}`;
                                $('#nombre-estudiante-input').val(nombreCompleto);
                                $('#mensajeexito').text('Número de carnet válido').show();
                                $('#mensaje').hide(); // Ocultar mensaje de error
                            } else {
                                $('#mensaje').text('No encontró al estudiante')
                                    .show(); // Mensaje cuando no se encuentra
                                $('#mensajeexito').hide(); // Ocultar mensaje de éxito
                                $('#nombre-estudiante-input').val('');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la solicitud:', error); // Log del error
                            alert('Error en la solicitud.');
                        }
                    });
                } else {
                    $('#nombre-estudiante-input').val('');
                    $('#mensaje').hide();
                    $('#mensajeexito').hide();
                }
            });
        });
    </script>
@endsection



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title">Lista de Estudiantes TESIS</h4>
                        <p class="card-title-desc">A continuación se muestran las calificaciones registradas.</p>
                    </div>
                    <div>
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addCalificacionModal">
                            <i class="fas fa-plus"></i> Agregar Nueva Calificación
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>Nombre estudiante</th>
                                <th>id_actaMaria</th>
                                <th>modalidad id</th>
                                <th>tutor acta id</th>
                                <th>tribunal acta id</th>
                                <th>num resolucion</th>
                                <th>lugar</th>
                                <th>fecha acta</th>
                                <th>hora comienzo</th>
                                <th>hora fin</th>
                                <th>calificacion total</th>
                                <th>calificacion_literal</th>
                                <th>valoracion</th>
                                <th>titulo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actas as $acta)
                                <tr>
                                    <td>{{ $acta->nombre }}</td>
                                    <td style="width: 80px">{{ $acta->id_acta }}</td>
                                    <td style="width: 80px">{{ $acta->modalidad_id }}</td>
                                    <td>{{ $acta->tutor_acta_id }}</td>
                                    <td>{{ $acta->tribunal_acta_id }}</td>
                                    <td>{{ $acta->num_resolucion }}</td>
                                    <td>{{ $acta->lugar }}</td>
                                    <td>{{ $acta->fecha_acta }}</td>
                                    <td>{{ $acta->hora_comienzo }}</td>
                                    <td>{{ $acta->hora_fin }}</td>
                                    <td>{{ $acta->calificacion_total }}</td>
                                    <td>{{ $acta->calificacion_literal }}</td>
                                    <td>{{ $acta->valoracion }}</td>
                                    <td>{{ $acta->titulo }}</td>
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
                                        <a href="#" class="btn btn-outline-success btn-sm update"
                                            title="Actualizar">
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
<div class="modal fade" id="addCalificacionModal" tabindex="-1" aria-labelledby="addCalificacionModalLabel"
    aria-hidden="true">
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
                        <input type="text" class="form-control" id="calificacionLiteral"
                            placeholder="Ej. Ochenta y cinco">
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
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
