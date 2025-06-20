<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/products/add', [WebController::class, 'showAddProductForm']);
Route::get('/products/list', [WebController::class, 'showProductList']);
Route::get('/products/update-stock', [WebController::class, 'showUpdateStockForm']);
Route::get('/products/low-stock', [WebController::class, 'showLowStock']);
