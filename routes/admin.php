<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MarcasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" and "admin" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('admin');
Route::get('/registros', [MarcasController::class, 'index'])->name('admin.marcas.index');
Route::get('/marcas/{id}/edit', [MarcasController::class, 'edit'])->name('admin.marcas.edit');
Route::post('/marcas', [MarcasController::class, 'store'])->name('admin.marcas.store');