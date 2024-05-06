<?php

use App\Http\Controllers\IngredientBackController;
use App\Http\Controllers\IngredientFrontController;
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
    Route::get('/translations', function(){
        $lang = app()->getLocale();
    
        $translations = [
            "en" => [
                "hello" => "Hello",
                "goodbye" => "Goodbye",
                "welcome" => "Welcome!",
                "farewell" => "Farewell!"
            ],
            "nl" => [
                "hello" => "Hallo",
                "goodbye" => "Tot ziens",
                "welcome" => "Welkom!",
                "farewell" => "Vaarwel!"
            ],
            "fr" => [
                "goodbye" => "Au revoir",
                "welcome" => "Bienvenue!",
                "farewell" => "Adieu!"
            ]
        ];
    
        return $translations[$lang];
    });

    Route::post('register', [JwtAuthController::class, 'register']);
    Route::post('login', [JwtAuthController::class, 'login']);
    
    Route::group([
        'middleware' => ["auth.csrf.jwt", "auth:api"]
    ], function() {
        Route::get('profile', [JwtAuthController::class, 'profile']);
        Route::post('refresh', [JwtAuthController::class, 'refreshToken']);
        Route::post('logout', [JwtAuthController::class, 'logout']);

        Route::get('ingredients/{id}', [IngredientFrontController::class, 'find']);

        Route::group([
            'middleware' => ["auth.admin"],
            'prefix' => '/admin'
        ], function() {
            Route::get('ingredients/{id}', [IngredientBackController::class, 'find']);
            Route::put('ingredients/{id}', [IngredientBackController::class, 'update']);
            Route::delete('ingredients/{id}', [IngredientBackController::class, 'delete']);
            Route::post('ingredients', [IngredientBackController::class, 'create']);
        });
    });
});
