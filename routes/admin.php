<?php

use App\Http\Controllers\TitularesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MarcasController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Marcas
Route::get('/', [HomeController::class, 'index'])->name('admin');
Route::get('/registros', [MarcasController::class, 'index'])->name('admin.marcas.index');
Route::get('/marcas/{id}/edit', [MarcasController::class, 'edit'])->name('admin.marcas.edit');
Route::get('/marca/{id}', [MarcasController::class, 'show'])->name('admin.marcas.show');
Route::get('/marcas', [MarcasController::class, 'create'])->name('admin.marcas.create');
Route::post('/marcas', [MarcasController::class, 'store'])->name('admin.marcas.store');
Route::post('/marcas/{id}', [MarcasController::class, 'update'])->name('admin.marcas.update');
Route::delete('/marcas/{id}', [MarcasController::class, 'destroy'])->name('admin.marcas.destroy');

// Titular
Route::get('/titular-select', [TitularesController::class, 'titularSelection'])->name('admin.titular.select');
Route::get('/titular', [TitularesController::class, 'index'])->name('admin.titular.add');
Route::get('/titulares', [TitularesController::class, 'show'])->name('admin.titular.show');
Route::post('/titular', [TitularesController::class, 'store'])->name('admin.titular.store');
Route::get('/titular/edit/{titular}', [TitularesController::class, 'edit'])->name('admin.titular.edit');
Route::post('/titular/update/{id}', [TitularesController::class, 'update'])->name('admin.titular.update');
Route::delete('/titular/delete/{id}', [TitularesController::class, 'destroy'])->name('admin.titular.destroy');

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