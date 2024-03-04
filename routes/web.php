<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
//Route::get('{{ route('dashboard') }}', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('/cargos', App\Http\Controllers\CargoController::class);
Route::resource('/tipotareas', App\Http\Controllers\TipotareaController::class);
Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class);
Route::resource('/contacts', App\Http\Controllers\ContactController::class);
Route::resource('listacorreos', App\Http\Controllers\ListacorreoController::class);
Route::resource('tareas', App\Http\Controllers\TareaController::class);