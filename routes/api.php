<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AssessmentController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\OptionController;

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


//  group routes middleware sunctum middleware
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('assessments', AssessmentController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('options', OptionController::class);

});






