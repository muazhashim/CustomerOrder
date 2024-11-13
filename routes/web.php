<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//order
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/order/create',[OrderController::class,'create'])->name('order.create');
Route::post('/order',[OrderController::class,'store'])->name('order.store');
Route::get('/order/edit/{order}',[OrderController::class,'edit'])->name('order.edit');
Route::put('/order/{order}',[OrderController::class,'update'])->name('order.update');
Route::delete('/order/{order}',[OrderController::class,'destroy'])->name('order.destroy');

//product
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{product}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/search', [App\Http\Controllers\ProductController::class, 'search'])->name('product.search');