<?php


use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\UserController;


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



Route::prefix('/dashboard')->group(function () {

    //// apis for admins
    Route::prefix('/admin')->group(function () {

        ///// register for new admin
        Route::post('/register',[AdminController::class,'register_admin']);


        ///// login admin
        Route::post('/login',[AdminController::class,'login_admin']);
    });


    Route::group(['middleware' => ['auth:sanctum' , 'abilities:admin']],function () {

        ///logout admin
        Route::get('/admin/logout',[AdminController::class,'logout_admin']);

        Route::prefix('/user')->group(function () {

            /// get pending users their registeration orders
            Route::get('/get-pending' , [UserController::class , 'get_pending_users']);

            //// update status registeration orders
            Route::post('/update-status/{id}',[UserController::class , 'update_status']);

        });

    });


});
