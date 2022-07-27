<?php

use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::resources([
        'penugasan'=> PenugasanController::class,
        'submission'=> SubmissionController::class
    ]);
    
    Route::post('/submission/submit/{id}', [SubmissionController::class, 'storeSubmission'])->name('submission.store');
});


require __DIR__.'/auth.php';
