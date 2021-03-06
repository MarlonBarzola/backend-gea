<?php

use App\Http\Controllers\Api\CategoryController;
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

Route::apiResource('libraries', LibraryController::class);

Route::get('libraries/search/{name}', [LibraryController::class, 'search'])->name('libraries.search');
Route::post('rents', [RentController::class, 'rentLibrary'])->name('rents.store');
Route::get('rents/{user}', [RentController::class, 'getUserLibrary'])->name('rents.show');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
