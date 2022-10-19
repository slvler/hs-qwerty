<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('homecontroller', HomeController::class);

Route::resource('productcontroller', ProductController::class);


Route::post('/addcart', [CartController::class, 'addcart'])->name('cartadd');
Route::post('/removecart', [CartController::class, 'removecart'])->name('removecart');
Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');



