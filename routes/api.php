<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product',[ProductController::class,'index']);
Route::post('/product',[ProductController::class,'store']);
Route::put('/product/edit{$id}',[ProductController::class,'edit']);
Route::delete('/product/delete{id}',[ProductController::class,'delete']);

Route::get('/category',[CategoryController::class,'index']);
Route::post('/category',[CategoryController::class,'store']);
Route::put('/category/edit{$id}',[CategoryController::class,'edit']);
Route::delete('/category/delete{id}',[CategoryController::class,'delete']);