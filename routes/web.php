<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/',[MainController::class,'index']);
Route::get('item/{id}',[\App\Http\Controllers\ItemController::class,'index']);
Route::get('/get_brands',[\App\Http\Controllers\ItemController::class,'get_brands']);
Route::get('/search',\App\Http\Livewire\SearchPage::class);
Route::get('brand/{brand}',\App\Http\Livewire\BrandSearch::class);
Route::get('/blog',[\App\Http\Controllers\BlogController::class,'index']);
require __DIR__.'/auth.php';
