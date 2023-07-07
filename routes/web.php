<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/',[MainController::class,'index']);
Route::get('item/{id}',[\App\Http\Controllers\ItemController::class,'index']);
Route::get('/get_brands',[\App\Http\Controllers\ItemController::class,'get_brands']);
Route::get('/search',\App\Http\Livewire\SearchPage::class);
Route::get('brand/{brand}',\App\Http\Livewire\BrandSearch::class);

