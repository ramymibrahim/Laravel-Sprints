<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\api\CategoriesController;
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


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/get_categories', [CategoriesController::class, 'get_categories']);
Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('getFeatured', [ProductsController::class, 'getFeatured']);
    Route::get('getRecent', [ProductsController::class, 'getRecent']);
});


Route::middleware('auth:api')->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});