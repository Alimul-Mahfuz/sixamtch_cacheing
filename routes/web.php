<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/product-without-cache/{id}', [ProductController::class, 'showNoCache'])->name('product.show.without-cache');
Route::get('/product-with-cache/{id}', [ProductController::class, 'showWithCache'])->name('product.show.with-cache');
