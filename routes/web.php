<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;


Route::get('/', [PessoaController::class, 'index']);

Route::resource('pessoas', PessoaController::class);

Route::get('/estados', [PessoaController::class, 'getEstados']);


Route::get('/cidades/{estadoId}', [PessoaController::class, 'getCidades']);