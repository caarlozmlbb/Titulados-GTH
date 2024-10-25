<?php

use App\Http\Controllers\ActaController;
use App\Http\Controllers\CalificacionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\TituladoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::resource('vista_modalidad', ModalidadController::class)->names('modalidades');

/*Rutas carlos */
Route::get('/calificacion_detallada', [CalificacionController::class, 'listar_calificaciones'])->name('calificacion');
Route::get('/buscar-estudiante', [CalificacionController::class, 'buscarEstudiante'])->name('buscarEstudiante');

Route::get('/lista_titulados', [TituladoController::class, 'listar_titulados'])->name('titulados');
Route::get('/lista_actas', [ActaController::class, 'listar_actas'])->name('actas');
Route::get('/examendegrado', [ActaController::class, 'listar_examen_grado'])->name('examenGrado');
Route::get('/excelencia', [ActaController::class, 'listar_excelencia_academica'])->name('excelenciaAcademica');
Route::get('/proyecto', [ActaController::class, 'listar_proyecto'])->name('proyecto');
Route::get('/tesis', [ActaController::class, 'listar_tesis'])->name('tesis');
Route::get('/tecnico_superior', [ActaController::class, 'listar_tecnico_superior'])->name('tecnicoSuperior');
Route::get('/tecnico_medio', [ActaController::class, 'listar_tecnico_medio'])->name('tecnicoMedio');
Route::get('/trabajo_dirigido', [ActaController::class, 'listar_trabajo_dirigido'])->name('trabajo');
// Route::post('/crear-acta', [CalificacionController::class, 'crear_acta'])->name('crear-acta');
Route::get('/crear-acta', [CalificacionController::class, 'crear_acta'])->name('crear-acta');
Route::post('/crear-acta/titulo',[ActaController::class, 'agregarTitulo'])->name('crear_acta_titulo');
Route::post('/actualizar-calificacion/{acta}', 'ActaController@actualizarCalificacion');
Route::post('/calificaciones/guardar', [CalificacionController::class, 'guardar_calificacion'])->name('calificaciones.guardar');
Route::put('/calificaciones/{id}', [CalificacionController::class, 'actualizar'])->name('calificaciones.actualizar');
Route::delete('/calificaciones/{id}', [CalificacionController::class, 'eliminar'])->name('calificaciones.eliminar');
Route::post('/acta/update/{id}', [ActaController::class, 'actualizarActaInformacion'])->name('acta.update');




Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);

//Language Translation

Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');


// web.php (rutas)

Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('password.update');
// web.php
Route::get('/change-user-info', [PasswordController::class, 'showUpdateForm'])->name('user.change');
Route::put('/update-user-info', [PasswordController::class, 'update'])->name('user.update');
// web.php
Route::get('/settings', function () {
    return view('auth.settings');
})->name('settings');

Route::put('/update-password', [PasswordController::class, 'updatePassword'])->name('password.update');
Route::put('/update-info', [PasswordController::class, 'updateInfo'])->name('info.update');


Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);

