<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('health', function () {
    return response()->json(['status' => 'ok']);
})->name('health');

Route::apiResource('products', App\Http\Controllers\ProductController::class);
Route::apiResource('categories', App\Http\Controllers\CategoryController::class);

Route::get('products/category/{categoryId}', [App\Http\Controllers\ProductController::class, 'productsByCategory'])
    ->name('products.byCategory');
Route::get('products/low-stock', [App\Http\Controllers\ProductController::class, 'productsWithLowStock'])
    ->name('products.withLowStock');

