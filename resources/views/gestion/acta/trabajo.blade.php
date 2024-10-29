@extends('layouts.master')
@section('title')
    @lang('translation.Datatables')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Tables
        @endslot
        @slot('title')
            Trabajo dirigido
        @endslot
    @endcomponent

    <div class="row align-items-center mt-4">

        <div class="col-lg-4 col-md-3 mb-3">
            <div class="card text-center shadow-sm border-0 h-100">
                <div class="card-body">
                    <i class="fas fa-user-graduate fa-3x text-warning"></i>
                    <h5 class="card-title text-primary">Estudiante Seleccionado</h5>
                    <p class="card-text" id="studentName">Nombre del Estudiante</p>
                    <div class="d-flex justify-content-center align-items-center">

                        <form action="{{ route('crear-acta') }}" method="GET" class="ml-4">
                            @csrf
                            <p class="card-text text-success mb-0" id="studentCarnet" name="carnet">Carnet: XXXXXX</p>
                            <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" hidden>
                            <input type="text" class="form-control" id="id_modalidad" name="id_modalidad" value="{{$id_modalidad->id_modalidad}}" hidden>
                            <button type="submit" class="btn btn-primary btn-sm" href="">
                                <i class="fas fa-plus"></i> Editar Acta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-8 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h4 class="card-title">Buscar de Estudiantes</h4>
                    <form method="GET">
                        <div class="row align-items-end">

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



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Acta Trabajo Dirigido</h4>
                    <p class="card-title-desc">
                        Bienvenido a la sección de generación de <b>Actas</b> de <b>Trabajo Dirigido</b>, donde podrás introducir los datos necesarios para crear actas de manera rápida y eficiente. También podrás generar un informe completo sobre todos los titulados en formatos <b>PDF</b> y <b>Excel</b>.
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nombre Estudiante</th>
                                <th>Carnet</th>
                                <th>id_actaMaria</th>
                                <th>modalidad id</th>
                                <th>tutor acta id</th>
                                <th>N° Resolución</th>
                                <th>Lugar</th>
                                <th>Fecha Acta</th>
                                <th>Hora Comienzo</th>
                                <th>Hora Fin</th>
                                <th>Calificacion total</th>
                                <th>Calificacion_literal</th>
                                <th>valoracion</th>
                                <th>Titulo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($actas as $acta)
                                <tr>
                                    <td>{{ $acta->nombre }}</td>
                                    <td>{{ $acta->ci }}</td>
                                    <td>{{ $acta->id_acta }}</td>
                                    <td>{{ $acta->modalidad_id }}</td>
                                    <td>{{ $acta->tutor_acta_id }}</td>
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
                                        <a href="{{ route('crear-acta', ['id_estudiante' => $acta->id_estudiante, 'id_modalidad' => $acta->modalidad_id]) }}" class="btn btn-outline-primary btn-sm" title="Editar">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <!-- Botón para Eliminar -->
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <!-- Botón para Generar PDF -->
                                        <a href="{{ route('acta.pdf', ['id' => $acta->id_estudiante]) }}" class="btn btn-outline-success btn-sm update" title="Generar PDF" target="_blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#btnBuscar').on('click', function(e) {
                e.preventDefault();

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
                                $('#id_estudiante').val(response.id_estudiante);
                                $('#studentName').text(
                                nombreCompleto); // Actualizar el nombre en el div de "Estudiante Seleccionado"
                                $('#studentCarnet').text(
                                `Carnet: ${carnet}`); // Actualizar el carnet en el div de "Estudiante Seleccionado"
                                $('#mensajeexito').text('Número de carnet válido').show();
                                $('#mensaje').hide(); // Ocultar mensaje de error
                            } else {
                                $('#mensaje').text('No encontró al estudiante')
                            .show(); // Mensaje cuando no se encuentra
                                $('#mensajeexito').hide(); // Ocultar mensaje de éxito
                                $('#nombre-estudiante-input').val('');
                                $('#id_estudiante').val('');
                                $('#studentName').text(
                                'Nombre del Estudiante'); // Restablecer el valor por defecto
                                $('#studentCarnet').text(
                                'Carnet: XXXXXX'); // Restablecer el valor por defecto
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la solicitud:', error); // Log del error
                            alert('Error en la solicitud.');
                        }
                    });
                } else {
                    $('#nombre-estudiante-input').val('');
                    $('#studentName').text('Nombre del Estudiante'); // Restablecer el valor por defecto
                    $('#studentCarnet').text('Carnet: XXXXXX'); // Restablecer el valor por defecto
                    $('#mensaje').hide();
                    $('#mensajeexito').hide();
                }
            });
        });
    </script>
@endsection
