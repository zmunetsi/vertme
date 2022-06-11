<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AssessmentController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\OptionController;
use App\Http\Controllers\API\AssessmentCategoryController;
use App\Http\Controllers\API\AuthController;

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


//  group routes middleware sunctum middleware
Route::group(['middleware' => ['auth:sanctum']], function () {


    //user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('logout', [AuthController::class, 'logout']);

    // login


    Route::resource('assessments/categories',AssessmentCategoryController::class);

    Route::resource('assessments', AssessmentController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('options', OptionController::class);

    //update assessment status
    Route::post('assessments/update-status', [AssessmentController::class, 'updateStatus'])
        ->name('assessment.update-status');
    
    // assessment results
    Route::post('assessments/track-assessment', [AssessmentController::class, 'trackAssessment'])
        ->name('assessment.track');

    Route::post('assessments/getassessment-track', [AssessmentController::class, 'getAssessmentTrack'])
        ->name('assessment.gettrack');


});






