<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ShopController;

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
Route::get('/fibonacci', [FibonacciController::class, 'index'])->name('fibonacci');
Route::get('/range', [RangeController::class, 'index'])->name('range');
Route::get('/get', [TestController::class, 'index'])->name('get');
Route::get('/fill', [TestController::class, 'fill']);
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
