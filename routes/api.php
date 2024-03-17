<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('store', [BookController::class, 'store']);
    Route::put('book/{id}', [BookController::class, 'update']);
    Route::delete('book/{id}',[BookController::class, 'destroy']);
});

Route::get('/', [BookController::class, 'index']);
Route::post('login', [UserController::class, 'login']);
