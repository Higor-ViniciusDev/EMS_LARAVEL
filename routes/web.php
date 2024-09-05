<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


// Route::get('/user', [UserController::class, 'index']);