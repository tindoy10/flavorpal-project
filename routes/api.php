<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NutritionController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\SavedRecipeController;
use App\Http\Controllers\Api\UserPreferenceController;
use App\Http\Controllers\Api\RatingController;

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

Route::middleware('auth:sanctum')->group(function () {
});

// Routes for User Authentication

Route::controller(AuthController::class)->group(function () {
    Route::post('/register',                            'register')->name('user.register');
    Route::post('/login',                               'login')->name('user.login');
    Route::get('/latest-login-id',                      'getLatestLoginId');
});

// Routes for the RecipeController API

Route::controller(RecipeController::class)->group(function () {
    Route::get('/latest-recipe-id',                     'getLatestRecipeId');
    Route::post('/recipe',                              'store');
});

// Routes for the NutritionController API

Route::controller(NutritionController::class)->group(function () {
    Route::post('/nutrition',                           'store');
    Route::get('/latest-nutrition-id',                  'getLatestNutritionId');
});

// Route for the RatingController API

Route::post('/rating', [RatingController::class, 'store']);

// Route for the SavedRecipeController API

Route::post('/saved-recipe', [SavedRecipeController::class, 'store']);

// Route for the UserPreferenceController API

Route::post('/user-preference', [UserPreferenceController::class, 'store']);

