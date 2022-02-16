<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthTokenController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class , 'login']);
Route::post('/register', [AuthController::class , 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('categories' , [\App\Http\Controllers\Api\CategoryController::class , 'index']);
//Route::post('categories' , [\App\Http\Controllers\Api\CategoryController::class , 'store']);
//Route::get('categories/{category}', [\App\Http\Controllers\Api\CategoryController::class , 'show']);
//Route::get('products' , [\App\Http\Controllers\Api\ProductController::class , 'index']);

Route::middleware('auth:sanctum')
    ->group(function (){
        Route::apiResource('categories' , \App\Http\Controllers\Api\CategoryController::class);
        Route::apiResource('transactions', \App\Http\Controllers\Api\TransactionController::class);
    });

//Route::post('auth/token', [AuthTokenController::class , 'store']);


