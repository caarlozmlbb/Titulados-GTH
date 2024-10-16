<?php

use App\Http\Controllers\ActaController;
use App\Http\Controllers\CalificacionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\TituladoController;
use App\Models\Modalidad;

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
Route::get('/vista_modalidad', [ModalidadController::class, 'vista_modalidad'])->name('modalidad');
/*Rutas carlos */
Route::get('/calificacion_detallada', [CalificacionController::class, 'listar_calificaciones'])->name('calificacion');
Route::get('/buscar-estudiante', [CalificacionController::class, 'buscarEstudiante'])->name('buscar.estudiante');
Route::get('/lista_titulados', [TituladoController::class, 'listar_titulados'])->name('titulados');
Route::get('/lista_actas', [ActaController::class, 'listar_actas'])->name('actas');


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

