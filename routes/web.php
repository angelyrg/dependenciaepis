<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ModalidadController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('home', 'home')->name('home')->middleware('auth');
Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'] )->name('login');
Route::post('logout', [LoginController::class, 'logout'] )->name('logout');

Route::resource('docentes', DocenteController::class)->names('docentes')->middleware('auth.responsable');

Route::resource('modalidads', ModalidadController::class)->names('modalidads')->middleware('auth.responsable');

