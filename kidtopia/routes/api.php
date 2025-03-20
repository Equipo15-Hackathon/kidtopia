<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\AgeRangeController;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::get('/categories', [CategoryController::class, 'index'])->name('apiCategoriesIndex');
Route::post('/categories', [CategoryController::class, 'store'])->name('apiCategoriesStore');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('apiCategoriesShow');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('apiCategoriesUpdate');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('apiCategoriesDestroy');

Route::get('/brands', [BrandController::class, 'index'])->name('apiBrandsIndex');
Route::post('/brands', [BrandController::class, 'store'])->name('apiBrandsStore');
Route::get('/brands/{id}', [BrandController::class, 'show'])->name('apiBrandsShow');
Route::put('/brands/{id}', [BrandController::class, 'update'])->name('apiBrandsUpdate');
Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('apiBrandsDestroy');

Route::get('/ageRanges', [AgeRangeController::class, 'index'])->name('apiAgeRangesIndex');
Route::post('/ageRanges', [AgeRangeController::class, 'store'])->name('apiAgeRangesStore');
Route::get('/ageRanges/{id}', [AgeRangeController::class, 'show'])->name('apiAgeRangesShow');
Route::put('/ageRanges/{id}', [AgeRangeController::class, 'update'])->name('apiAgeRangesUpdate');
Route::delete('/ageRanges/{id}', [AgeRangeController::class, 'destroy'])->name('apiAgeRangesDestroy');

Route::get('/products', [ProductController::class, 'index'])->name('apiProductsIndex');
Route::post('/products', [ProductController::class, 'store'])->name('apiProductsStore');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('apiProductsShow');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('apiProductsUpdate');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('apiProductsDestroy');
