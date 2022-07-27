<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EjecutorController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\ProyectoAseController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoEstController;
use App\Http\Controllers\ReglamentoAseController;
use App\Http\Controllers\ReglamentoController;
use App\Http\Controllers\ReglamentoEstController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::view('home', 'home')->name('home')->middleware('auth');
Route::view('login', 'auth.login')->name('login')->middleware('guest');

Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');

Route::resource('asesors', AsesorController::class)->names('asesors')->middleware('auth.responsable');

Route::resource('modalidads', ModalidadController::class)->names('modalidads')->middleware('auth.responsable');
Route::resource('proyectos', ProyectoController::class)->names('proyectos')->middleware('auth.responsable');
//Route::resource('estudiantes', EstudianteController::class)->names('estudiantes')->middleware('auth.responsable');
Route::resource('ejecutores', EjecutorController::class)->names('ejecutores')->middleware('auth.responsable');
Route::resource('reglamentos', ReglamentoController::class)->names('reglamentos')->middleware('auth.responsable');

Route::resource('asesor/proyectos', ProyectoAseController::class)->names('aproyectos')->middleware('auth.asesor');
Route::get('asesor/reglamentos', [ReglamentoAseController::class, 'index'])->name('areglamentos')->middleware('auth.asesor');


Route::get('proyecto', [ProyectoEstController::class, 'index'])->name('proyecto')->middleware('auth.estudiante');
Route::get('asesor', [ProyectoEstController::class, 'asesor'])->name('asesor')->middleware('auth.estudiante');
Route::get('estudiante/reglamentos', [ReglamentoEstController::class, 'index'])->name('sreglamentos')->middleware('auth.estudiante');
Route::resource('informes', InformeController::class)->names('informes')->middleware('auth.estudiante');
