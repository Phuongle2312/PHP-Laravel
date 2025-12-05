<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);
