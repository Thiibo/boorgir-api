<?php

use Illuminate\Http\Request;
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

Route::post('register', [JwtAuthController::class, 'register']);
Route::post('login', [JwtAuthController::class, 'login']);

Route::group([
    'middleware' => ["auth.csrf.jwt", "auth:api"]
], function() {
    Route::post('profile', [JwtAuthController::class, 'profile']);
    Route::post('refresh', [JwtAuthController::class, 'refreshToken']);
    Route::post('logout', [JwtAuthController::class, 'logout']);
});
