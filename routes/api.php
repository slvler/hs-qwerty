<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', [UserController::class, 'index']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/show/{id}', [UserController::class, 'show']);
Route::put('/users/update/{id}', [UserController::class, 'update']);
Route::delete('/users/destroy', [UserController::class, 'destroy']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::get('/categories/show/{id}', [CategoryController::class, 'show']);
Route::put('/categories/update/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/destroy', [CategoryController::class, 'destroy']);


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);
Route::put('/product/update/{id}', [ProductController::class, 'update']);
Route::delete('/product/destroy', [ProductController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/order/store', [OrderController::class, 'store'])->middleware('product.stock');
Route::delete('/order/destroy', [OrderController::class, 'destroy']);
