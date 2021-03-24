<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EdicionColaborador;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/create', function () {
    return view('create');
})->name('create');

Route::middleware(['auth:sanctum', 'verified'])->get('/edit', function () {
    return view('edit');
})->name('edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center', function () {
    return view('controlCenter');
})->name('control-center');

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center/area', function () {
    return view('tablaArea');
})->name('tabla-area');

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center/claves-radio', function () {
    return view('tablaClavesRadio');
})->name('tabla-claves-radio');

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center/eventos-especiales', function () {
    return view('tablaEventosEspeciales');
})->name('tabla-eventos-especiales');

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center/extensiones', function () {
    return view('tablaExtensiones');
})->name('tabla-extensiones');

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center/niveles', function () {
    return view('tablaNiveles');
})->name('tabla-niveles');


Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{no_colaborador}', EdicionColaborador::class);