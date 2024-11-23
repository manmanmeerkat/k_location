<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']); // 全製品を取得
Route::get('/search/products', [ProductController::class, 'search']); // 製品の検索
