<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserloginController;
use App\Http\Controllers\DeshbroadController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LogoutController;

Route::get("/",[UserloginController::class,"index"]);
Route::post("/",[UserloginController::class,"login"])->name("login");
Route::get("/deshbroad",[DeshbroadController::class,"index"])->middleware(middleware: 'user');


Route::get('/market',[MarketController::class,'index']);


Route::get('/shop',[ShopController::class,'index']);

Route::get("/logout",[LogoutController::class,"logout"]);