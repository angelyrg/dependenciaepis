<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ReglamentoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('home', 'home')->name('home')->middleware('auth');
Route::view('login', 'auth.login')->name('login')->middleware('guest');

Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');

Route::resource('asesors', AsesorController::class)->names('asesors')->middleware('auth.responsable');

Route::resource('modalidads', ModalidadController::class)->names('modalidads')->middleware('auth.responsable');
Route::resource('proyectos', ProyectoController::class)->names('proyectos')->middleware('auth.responsable');
Route::resource('estudiantes', EstudianteController::class)->names('estudiantes')->middleware('auth.responsable');
Route::resource('reglamentos', ReglamentoController::class)->names('reglamentos')->middleware('auth.responsable');
