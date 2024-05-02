<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('/user')->group(function () {
    
    //// register user
    Route::post('/register',[UserController::class ,'register_user']);

    //// login user
    Route::post('/login',[UserController::class ,'login_user']);
});


Route::prefix('/category')->group(function () {
    //// add category
    Route::post('/add',[CategoryController::class , 'add_category']);

});

Route::prefix('/sub-category')->group(function () {

    //// add sub category
    Route::post('/add',[SubCategoryController::class , 'add_sub_category']);

});

Route::middleware('auth:sanctum')->group(function () {

    //// logout user
    Route::get('/user/logout',[UserController::class ,'logout_user']);
});
