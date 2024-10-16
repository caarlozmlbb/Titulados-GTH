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
            Kardex
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buscador</h4>
                    <form>
                        <div class="row align-items-end">
                            <!-- Columna para el Seleccionar -->
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label class="form-label">Selecionar</label>
                                <select class="form-control select2-search-disable">
                                    <option>Selecionar</option>
                                    <optgroup label="--Seleccionar--">
                                        <option value="Academico">Academico</option>
                                        <option value="Inscripcion">Inscripcion</option>
                                        <option value="Condiciones">Condiciones</option>
                                    </optgroup>
                                </select>
                            </div>
                            <!-- Columna para el campo de búsqueda -->
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="example-search-input" class="form-label">Buscar</label>
                                <input class="form-control" type="search" placeholder="Buscar..." id="example-search-input">
                            </div>
                            <!-- Columna para el botón -->
                            <div class="col-lg-2 col-md-2 mb-3">
                                <button type="button" class="btn btn-outline-primary waves-effect waves-light">Buscar</button>
                            </div>
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

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="card-title">Historial de documentos</h4>
                            <p class="card-title-desc">Documentos academicos</p>
                        </div>
                        <div>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocumentModal">
                                <i class="fas fa-plus"></i> Agregar
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td data-field="id" style="width: 80px">1</td>
                                    <td data-field="name">David McHenry</td>
                                    <td data-field="age">24</td>
                                    <td data-field="gender">Male</td>
                                    <td style="width: 100px">
                                         <!-- Botón para Editar -->
                                         <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Botón para Eliminar -->
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Botón para Actualizar -->
                                        <a class="btn btn-outline-secondary btn-sm update" title="Update">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr data-id="2">
                                    <td data-field="id">2</td>
                                    <td data-field="name">Frank Kirk</td>
                                    <td data-field="age">22</td>
                                    <td data-field="gender">Male</td>
                                    <td>
                                         <!-- Botón para Editar -->
                                         <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Botón para Eliminar -->
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Botón para Actualizar -->
                                        <a class="btn btn-outline-secondary btn-sm update" title="Update">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr data-id="3">
                                    <td data-field="id">3</td>
                                    <td data-field="name">Rafael Morales</td>
                                    <td data-field="age">26</td>
                                    <td data-field="gender">Male</td>
                                    <td>
                                         <!-- Botón para Editar -->
                                         <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Botón para Eliminar -->
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Botón para Actualizar -->
                                        <a class="btn btn-outline-secondary btn-sm update" title="Update">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr data-id="4">
                                    <td data-field="id">4</td>
                                    <td data-field="name">Mark Ellison</td>
                                    <td data-field="age">32</td>
                                    <td data-field="gender">Male</td>
                                    <td>
                                         <!-- Botón para Editar -->
                                         <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Botón para Eliminar -->
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Botón para Actualizar -->
                                        <a class="btn btn-outline-secondary btn-sm update" title="Update">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr data-id="5">
                                    <td data-field="id">5</td>
                                    <td data-field="name">Minnie Walter</td>
                                    <td data-field="age">27</td>
                                    <td data-field="gender">Female</td>
                                    <td>
                                        <!-- Botón para Editar -->
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Botón para Eliminar -->
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Botón para Actualizar -->
                                        <a class="btn btn-outline-secondary btn-sm update" title="Update">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

<!-- Modal -->
<div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDocumentModalLabel">Agregar Nuevo Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="documentName" class="form-label">Nombre del Documento</label>
                        <input type="text" class="form-control" id="documentName" placeholder="Ingrese el nombre del documento">
                    </div>
                    <div class="mb-3">
                        <label for="documentType" class="form-label">Tipo de Documento</label>
                        <select class="form-control" id="documentType">
                            <option value="Informe">Informe</option>
                            <option value="Certificado">Certificado</option>
                            <option value="Contrato">Contrato</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="documentDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="documentDescription" rows="3" placeholder="Ingrese la descripción del documento"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="documentFile" class="form-label">Subir PDF</label>
                        <input type="file" class="form-control" id="documentFile" accept=".pdf">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection
