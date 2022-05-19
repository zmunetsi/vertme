<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\AdminController as PagesAdminController;
use App\Http\Controllers\Auth\AdminController as AuthAdminController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;

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

    // import and exports

    Route::get('assessments/export', [AssessmentController::class, 'export'])
         ->name( 'assessment.export' );
    Route::get('questions/import/{id}', [QuestionController::class, 'import'])
        ->name( 'question.import' );
    Route::get('options/import/{id}', [OptionController::class, 'import'])
        ->name( 'option.import' );

     // end emport and export

    //  multi deletes
    Route::post('assessments/delete-all', [AssessmentController::class, 'deleteAll'])
        ->name( 'assessment.delete-all' );

    Route::post('questions/delete-all', [QuestionController::class, 'deleteAll'])
        ->name( 'question.delete-all' );

    Route::post('options/delete-all', [OptionController::class, 'deleteAll'])
        ->name( 'option.delete-all' );

    // multi deletes

});