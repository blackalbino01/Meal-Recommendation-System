<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\AllergyController;

Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('meals', [MealController::class, 'index']);
    Route::get('meals/{allergy_id}', [MealController::class, 'fetchRecommendedMeal']);
    Route::get('allergies', [AllergyController::class, 'index']);
});