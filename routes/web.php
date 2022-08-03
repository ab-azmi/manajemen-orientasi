<?php

use App\Models\Absensi;
use App\Models\SesiAbsensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\EventDayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\SubmissionController;

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


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::resources([
        'penugasan'=> PenugasanController::class,
        'submission'=> SubmissionController::class,
        'groups'=> GroupController::class,
        'event_days'=> EventDayController::class,
        'absens'=> AbsensiController::class,
    ]);
    
    Route::post('/submission/submit/{id}', [SubmissionController::class, 'storeSubmission'])->name('submission.store');
    Route::patch('/absens/toggle_status/{sesi}', [AbsensiController::class, 'toggleStatus'])->name('absens.toggle');

    Route::post('/attachments', function(){
        request()->validate([
            'attachment' => ['required', 'file'],
        ]);
        $path = request()->file('attachment')->store('trix-attachments', 'public');

        return [
            'image_url' => Storage::disk('public')->url($path),
        ];
    })->name('attachments.store');
});



require __DIR__.'/auth.php';
