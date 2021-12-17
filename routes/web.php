<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', [UserController::class, 'show']);


Route::post('/user', [UserController::class, 'create']);

Route::get('/order', [UserController::class, 'order']);
