<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductServiceController;
use App\Http\Controllers\CartServiceController;

use App\Http\Controllers\CartController;



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

Route::apiResource('products', ProductServiceController::class);


Route::get('/cartlist', [CartServiceController::class, 'cartlist']);

Route::get('/cartlist', [CartServiceController::class, 'cartlist']);

Route::post('/cartproductadd', [CartServiceController::class, 'cartproductadd']);


//
Route::get('/addcartlist', [CartController::class, 'addcartlist']);

Route::post('/addcartservice', [CartController::class, 'addcartservice']);
