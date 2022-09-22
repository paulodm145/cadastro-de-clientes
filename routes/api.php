<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clients/{id}', 'show')->name('clients.show');
    Route::get('/clients', 'index')->name('clients.index');
    Route::post('/clients', 'store')->name('clients.store');
    Route::put('/clients/{id}', 'update')->name('clients.update');
    Route::delete('/clients/{id}', 'destroy')->name('clients.delete');
});

Route::controller(ProdutosController::class)->group(function () {
    Route::get('/produtos/{id}', 'show');
    Route::get('/produtos', 'index');
    Route::post('/produtos', 'store');
    Route::put('/produtos/{id}', 'update')->name('editar');
});




