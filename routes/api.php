<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function(){

    //Auth Route
    Route::prefix('auth')->group(function(){
        //Register
        Route::post('register',[RegisterController::class,'register']);
        //Login
        Route::post('login',[LoginController::class,'login']);
        //Logout
        Route::middleware('auth:sanctum')->get('logout',[LogoutController::class,'logout']);
    });

    //Protected Route User
    Route::middleware('auth:sanctum')->prefix('users')->group(function(){
        Route::resource('/',UserController::class);
    });
});
