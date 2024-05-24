<?php

use App\Http\Controllers\BurgerBackController;
use App\Http\Controllers\BurgerFrontController;
use App\Http\Controllers\BurgerImageController;
use App\Http\Controllers\IngredientBackController;
use App\Http\Controllers\IngredientFrontController;
use App\Http\Controllers\IngredientImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtAuthController;

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

Route::middleware('language')->group(function () {
    Route::get('translations', fn() => trans('static'));
    Route::post('register', [JwtAuthController::class, 'register']);
    Route::post('login', [JwtAuthController::class, 'login']);
    
    Route::group([
        'middleware' => ["auth.csrf.jwt", "auth:api"]
    ], function() {
        Route::get('profile', [JwtAuthController::class, 'profile']);
        Route::post('refresh', [JwtAuthController::class, 'refreshToken']);
        Route::post('logout', [JwtAuthController::class, 'logout']);

        Route::get('ingredients', [IngredientFrontController::class, 'all']);
        Route::get('ingredients/{id}', [IngredientFrontController::class, 'find']);
        Route::get('ingredients/{id}/thumbnail', [IngredientImageController::class, 'get']);

        Route::get('burgers', [BurgerFrontController::class, 'all']);
        Route::get('burgers/{id}', [BurgerFrontController::class, 'find']);
        Route::get('burgers/{id}/thumbnail', [BurgerImageController::class, 'get']);

        Route::group([
            'middleware' => ["auth.admin"],
            'prefix' => '/admin'
        ], function() {
            Route::get('ingredients', [IngredientBackController::class, 'all']);
            Route::get('ingredients/{id}', [IngredientBackController::class, 'find']);
            Route::put('ingredients/{id}', [IngredientBackController::class, 'update']);
            Route::delete('ingredients/{id}', [IngredientBackController::class, 'delete']);
            Route::post('ingredients/{id}/thumbnail', [IngredientImageController::class, 'upload']);
            Route::post('ingredients', [IngredientBackController::class, 'create']);

            Route::get('burgers', [BurgerBackController::class, 'all']);
            Route::get('burgers/{id}', [BurgerBackController::class, 'find']);
            Route::put('burgers/{id}', [BurgerBackController::class, 'update']);
            Route::delete('burgers/{id}', [BurgerBackController::class, 'delete']);
            Route::post('burgers/{id}/thumbnail', [BurgerImageController::class, 'upload']);
            Route::post('burgers', [BurgerBackController::class, 'create']);
        });
    });
});
