<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EdicionColaborador;
use App\Http\Livewire\AltaImss;
use App\Http\Controllers\ColaboradorController;
use App\Http\Livewire\ComprobarColaborador;
use App\Http\Livewire\FormularioContrato;
use App\Http\Livewire\Insignias;
use App\Http\Livewire\InsigniaUN;
use App\Http\Livewire\RegistroColaboradorEstacionamiento;
use App\Http\Livewire\UtilesEscolares;
use App\Http\Livewire\NuevoIngreso;
use App\Http\Livewire\ActualizarNuevoIngreso;
use App\Http\Livewire\EvaluacionDesempeno;
use App\Http\Livewire\EvalucacionDesempenoExcel;
use App\Http\Livewire\EvaluacionColores;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/control-center/puestos', function () {
    return view('tablaPuestos');
})->name('tabla-puestos');

Route::middleware(['auth:sanctum', 'verified'])->get('/multi-contratos', function () {
    return view('multiContratos');
})->name('multi-contratos');

Route::middleware(['auth:sanctum', 'verified'])->get('/lista-vehiculos', function () {
    return view('listaVehiculos');
})->name('lista-vehiculos');

Route::middleware(['auth:sanctum', 'verified'])->get('/directorio', function () {
    return view('directorioPersonal');
})->name('directorio');

Route::middleware(['auth:sanctum', 'verified'])->get('/supervisores-unidad-negocio', function () {
    return view('tablasuperun');
})->name('tablaSupervisor');

Route::middleware(['auth:sanctum', 'verified'])->get('/incidencias', function () {
    return view('incidenciasSPRL');
})->name('incidencias');

// * Externos

Route::middleware(['auth:sanctum', 'verified'])->get('/registro-externos', function () {
    return view('registroExterno');
})->name('registro-externos');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard-externos', function () {
    return view('dashboardExternos');
})->name('dashboard-externos');

Route::middleware(['auth:sanctum', 'verified'])->get('/lista-vehiculos-externos', function () {
    return view('listaVehiculosExternos');
})->name('lista-vehiculos-externos');

// * Formularios internos

Route::middleware(['auth:sanctum', 'verified'])->get('/pdf/contrato_administrativo', [ColaboradorController::class, 'createPDF']);

Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{no_colaborador}', EdicionColaborador::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/contrato/{no_colaborador}', FormularioContrato::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/insignias/{no_colaborador}', Insignias::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/insignias-unidad-negocio/{no_colaborador}', InsigniaUN::class);

// * Formularios colaborador desde Factor

Route::get('/descarga-alta-imss/{no_colaborador}', AltaImss::class);

Route::get('/registro-colaborador-estacionamiento/{no_colaborador}', RegistroColaboradorEstacionamiento::class);

Route::get('/colaborador/{no_colaborador}', ComprobarColaborador::class);

Route::get('/utiles-escolares/{no_colaborador}',UtilesEscolares::class);

Route::get('/nuevo-ingreso',NuevoIngreso::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/revision-documentacion', function () {
    return view('revision-doc');
})->name('revision-doc');

Route::get('/actualizar/nuevo-ingreso/{id_ni}',ActualizarNuevoIngreso::class);

Route::get('disc',EvaluacionColores::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/uniformes', function () {
    return view('registroTallas');
})->name('registroTallas');

Route::get('/evaluacionDesempeno/{no_colaborador}',EvaluacionDesempeno::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/evaluacionDesempeoDashboard', function () {
    return view('revision-desempeno');
})->name('revision-desempeno');