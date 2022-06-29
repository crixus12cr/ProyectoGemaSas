<?php

use App\Http\Controllers\ArchivoController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/welcome', [ArchivoController::class, 'txt'])->name('procesar');
Route::get('/welcome')->name('regresar');
Route::get('archivo/agregar', [ArchivoController::class, 'create'])->name('archivo.create');
Route::post('archivo/guardar', [ArchivoController::class, 'store'])->name('archivo.guardar');
Route::get('/', [ArchivoController::class, 'index'])->name('/welcome');
Route::get('archivo/{archivo}/editar', [ArchivoController::class, 'edit'])->name('archivo.edit');
Route::put('archivo/{archivo}/actualizar', [ArchivoController::class, 'update'])->name('archivo.update');
Route::delete('archivo/{archivo}/eliminar', [ArchivoController::class, 'destroy'])->name('archivo.destroy');