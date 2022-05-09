<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\AdminController as PagesAdminController;
use App\Http\Controllers\Auth\AdminController as AuthAdminController;
use App\Http\Controllers\AssessmentController;

//add admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [PagesAdminController::class, 'index'])->name('admin.index');

    Route::get('/login', [AuthAdminController::class, 'login'])
        ->name('admin.login')
        ->withoutMiddleware(['auth', 'role:admin']);
    Route::post('login', [AuthAdminController::class, 'loginPost'])
        ->name('admin.login.post')
        ->withoutMiddleware(['auth', 'role:admin']);
    Route::post('logout', [AuthAdminController::class, 'logout'])
        ->name('admin.logout')
        ->withoutMiddleware(['auth', 'role:admin']);
        
    Route::resource('assessment', AssessmentController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('option', OptionController::class);


});