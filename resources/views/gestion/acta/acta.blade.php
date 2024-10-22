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
            Crear acta Estudiante NOMBRE ESTUDIANTE
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Calificaciones Trabajo Dirigido</h4>
                    <p class="card-title-desc">
                        Ingresa las <code>calificaciones</code>
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Agregar</th>
                                    <th>Defensa</th>
                                    <th>Fechas</th>
                                    <th>Calificación</th>
                                    <th>Valoración</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Filas de calificaciones existentes -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                                        </a>
                                    </td>
                                    <td>Perfil de trabajo dirigido</td>
                                    <td>15 de septiembre de 2023</td>
                                    <td>14/20</td>
                                    <td>Aprobado</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                           onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                                        </a>
                                    </td>
                                    <td>Defensa gran borrador del trabajo dirigido</td>
                                    <td>24 de noviembre de 2023</td>
                                    <td>20/30</td>
                                    <td>Aprobado</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                           onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm edit" title="Editar">
                                            <i class="fas fa-pencil-alt"></i> Agregar Nota
                                        </a>
                                    </td>
                                    <td>Defensa Final</td>
                                    <td>11 de marzo de 2024</td>
                                    <td>42/50</td>
                                    <td>Aprobado</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm delete" title="Eliminar"
                                           onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-success btn-sm update" title="Actualizar">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #f8d7da; color: #721c24;">
                                    <th colspan="4" style="text-align: right;">Total Nota:</th>
                                    <th>76/100</th>
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

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tribunales</h4>
                    <p class="card-title-desc">Use one of two modifier classes to make <code>&lt;thead&gt;</code>s appear
                        light or dark gray.</p>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped rows</h4>
                    <p class="card-title-desc">Use <code>.table-striped</code> to add zebra-striping to any table row within
                        the <code>&lt;tbody&gt;</code>.</p>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
