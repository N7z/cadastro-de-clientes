<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/clientes');

Route::controller(ClienteController::class)->group(function () {
    Route::get('/clientes', 'index')->name('clientes.index');
    Route::get('/clientes/create', 'create')->name('clientes.create');
    Route::post('/clientes/store', 'store')->name('clientes.store');
    Route::get('/clientes/{cliente}/edit', 'edit')->name('clientes.edit');
    Route::put('/clientes/{cliente}', 'update')->name('clientes.update');
    Route::delete('/clientes/{cliente}', 'destroy')->name('clientes.destroy');
});
