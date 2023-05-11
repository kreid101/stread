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
Route::get('/ses',function (){
   return session()->getId();
});
Route::get('/get_items',function(){
    unserialize(Redis::get('cart_'.session()->getId())) ? $this->items=unserialize(Redis::get('cart_'.session()->getId())) : null;
});
