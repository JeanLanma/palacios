<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MarcasController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/marca/{id}', [MarcasController::class, 'show'])->name('admin.marcas.show');
Route::delete('/marcas/{id}', [MarcasController::class, 'destroy'])->name('admin.marcas.destroy');
Route::post('/marcas', [MarcasController::class, 'store'])->name('admin.marcas.store');
Route::post('/marcas/{id}', [MarcasController::class, 'update'])->name('admin.marcas.update');

Route::get('/generate/storage/link', function(){
    Artisan::call('storage:link');
    return response('Ok', 201);
});
Route::get('clean-cache', function(){
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return redirect()->back();
});