<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendasController;
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
    Route::get('/products/{id}', 'show')->name('products.show');
    Route::get('/products', 'index')->name('products.index');
    Route::post('/products', 'store')->name('products.store');
    Route::put('/products/{id}', 'update')->name('products.update');
    Route::delete('/products/{id}', 'destroy')->name('products.delete');
});

Route::controller(VendasController::class)->group(function () {
    Route::get('/sales/{id}', 'show')->name('sales.show');
    Route::get('/sales', 'index')->name('sales.index');
    Route::post('/sales', 'store')->name('sales.store');
    Route::put('/sales/{id}', 'update')->name('sales.update');
    Route::delete('/sales/{id}', 'destroy')->name('sales.delete');
});




