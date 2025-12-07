<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

//test đơn giản xem file api.php có load được không
Route::get('/ping', function () {
    return response()->json(['message' => 'api ok']);
});

Route::middleware('api')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products-join', [ProductController::class, 'index']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});