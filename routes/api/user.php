<?php

use App\Http\Controllers\Api\User\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller( AuthController::class ) ->group(function () {
    Route::post( "/login" , 'login') ;
}) ;



Route::controller( 'App\Http\Controllers\TestController')->middleware(['auth:sanctum' , 'user_middleware'])->group(function(){
    Route::get("test_sanctum" , "test" ) ;
});


Route::controller( 'App\Http\Controllers\Api\User\DashboardController')->middleware(['auth:sanctum' , 'user_middleware'])->group(function()
{
    Route::get("/dashboard" , "index" ) ->name('dashboard') ;
});
