<?php

use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\SanctumController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'sanctum'], function () {
    Route::post('/signup', [SanctumController::class, 'signUp']);
    Route::post('/token', [SanctumController::class, 'token']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::delete('/sanctum/token', [SanctumController::class, 'destroy']);

    Route::group(['prefix' => 'quiz'], function () {
        Route::get('/question', [QuizController::class, 'question']);
        Route::get('/story/{question_id}', [QuizController::class, 'story']);
        Route::post('/answer-question', [QuizController::class, 'answerQuestion']);
    });
});
