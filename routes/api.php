<?php

use App\Http\Controllers\Api\AutorApiController;
use App\Http\Controllers\Api\EditoraApiController;
use App\Http\Controllers\Api\GeneroLiterarioApiController;
use App\Http\Controllers\Api\LivrosApiController;

Route::resource('autores', AutorApiController::class);
Route::resource('editoras', EditoraApiController::class);
Route::resource('genero_literarios', GeneroLiterarioApiController::class);
Route::resource('livros', LivrosApiController::class);