<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EjecutorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformeAseController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\InformeDinamicoController;
use App\Http\Controllers\InformeRespController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\ProyectoAseController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoEstController;
use App\Http\Controllers\ReglamentoAseController;
use App\Http\Controllers\ReglamentoController;
use App\Http\Controllers\ReglamentoEstController;
use Illuminate\Support\Facades\Route;

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


Route::view('/', 'welcome')->name('welcome');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('notifications', [HomeController::class, 'getNotifications'])->name('notifications')->middleware('auth');
//Route::view('home', 'home')->name('home')->middleware('auth');
Route::view('login', 'auth.login')->name('login')->middleware('guest');

Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');
Route::get('profile', [AccountController::class, 'profile'] )->name('profile');
Route::put('password', [AccountController::class, 'changePassword'] )->name('password');
Route::put('password/{user}/restore', [AccountController::class, 'restorePassword'] )->name('restore');

Route::resource('asesors', AsesorController::class)->names('asesors')->middleware('auth.responsable');
Route::resource('modalidads', ModalidadController::class)->names('modalidads')->middleware('auth.responsable');
Route::resource('proyectos', ProyectoController::class)->names('proyectos')->middleware('auth.responsable');
Route::resource('ejecutores', EjecutorController::class)->names('ejecutores')->middleware('auth.responsable');
Route::put('proyectos/{proyecto}/add_ejecutor', [EjecutorController::class, 'add'])->name('ejecutores.add')->middleware('auth.responsable');
Route::resource('reglamentos', ReglamentoController::class)->names('reglamentos')->middleware('auth.responsable');
Route::resource('cargos', CargoController::class)->names('cargos')->middleware('auth.responsable');
Route::resource('responsable/informes', InformeRespController::class)->names('responsable.informes')->middleware('auth.responsable');
Route::get('calendario', [CalendarioController::class, 'index'])->name('calendario')->middleware('auth.responsable');
Route::get('calendario/show', [CalendarioController::class, 'show'])->name('calendario.show')->middleware('auth.responsable');
Route::get('informesdinamicos', [InformeDinamicoController::class, 'index'])->name('informesdinamicos')->middleware('auth.responsable');
Route::post('informesdinamicos', [InformeDinamicoController::class, 'filtrar'])->name('informesdinamicos.filtrar')->middleware('auth.responsable');
Route::get('informesdinamicos/export', [ProyectoController::class, 'export'])->name('informesdinamicos.export')->middleware('auth.responsable');
Route::resource('documentos', DocumentoController::class)->only(['store', 'destroy'])->names('responsable.documentos')->middleware('auth.responsable');
Route::get('participacion', [EstudianteController::class, 'participacion'])->name('indiceparticipacion')->middleware('auth.responsable');
Route::post('setstudents', [EstudianteController::class, 'store'])->name('setstudents')->middleware('auth.responsable');


Route::resource('asesor/proyectos', ProyectoAseController::class)->names('aproyectos')->middleware('auth.asesor');
Route::get('asesor/reglamentos', [ReglamentoAseController::class, 'index'])->name('areglamentos')->middleware('auth.asesor');
Route::get('asesorados', [InformeAseController::class, 'index'])->name('asesorados')->middleware('auth.asesor');
Route::get('asesorados/{proyecto}', [InformeAseController::class, 'show'])->name('asesorados.proyecto')->middleware('auth.asesor');
Route::get('asesorados/{informe}/comments', [InformeAseController::class, 'comments'])->name('asesorado.comments')->middleware('auth.asesor');
Route::put('asesorados/{informe}', [InformeAseController::class, 'update'])->name('asesorado.informe_update')->middleware('auth.asesor');


Route::get('proyecto', [ProyectoEstController::class, 'index'])->name('proyecto')->middleware('auth.estudiante');
Route::get('asesor', [ProyectoEstController::class, 'asesor'])->name('asesor')->middleware('auth.estudiante');
Route::get('estudiante/reglamentos', [ReglamentoEstController::class, 'index'])->name('sreglamentos')->middleware('auth.estudiante');
Route::resource('informes', InformeController::class)->names('informes')->middleware('auth.estudiante');
Route::resource('comentarios', ComentarioController::class)->names('comentarios')->middleware('auth');

