<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\JWTController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LibraryController;
use App\Http\Controllers\Api\RentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::get('/profile', [JWTController::class, 'profile']);
});

Route::apiResource('libraries', LibraryController::class)->except(['show']);
//Route::get('libraries/{library}/{included?}', [LibraryController::class, 'show'])->name('libraries.show');
Route::get('libraries/{library}', [LibraryController::class, 'show'])->name('libraries.show');

Route::post('rents', [RentController::class, 'rentLibrary'])->name('rents.store');
Route::get('rents/{user}', [RentController::class, 'getUserLibrary'])->name('rents.show');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
