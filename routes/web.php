<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('home', 'home')->name('home')->middleware('auth');
Route::view('login', 'auth.login')->name('login')->middleware('guest');

Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');

Route::resource('asesors', AsesorController::class)->names('asesors')->middleware('auth.responsable');

Route::resource('modalidads', ModalidadController::class)->names('modalidads')->middleware('auth.responsable');
Route::resource('proyectos', ProyectoController::class)->names('proyectos')->middleware('auth.responsable');
Route::resource('estudiantes', ProyectoController::class)->names('estudiantes')->middleware('auth.responsable');
