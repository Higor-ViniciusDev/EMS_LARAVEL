<?php

use App\Http\Controllers\LoginUsario;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginUsario::class, 'Inicio'])->name('index');
Route::post('/login/autenticar', [LoginUsario::class, 'Autenticar']);