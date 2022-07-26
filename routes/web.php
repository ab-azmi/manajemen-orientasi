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
use App\Http\Controllers\EventController;
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
       
    Route::get('submission/download/{submission}', [SubmissionController::class, 'download'])->name('submission.download');
    Route::post('/submission/submit/{id}', [SubmissionController::class, 'storeSubmission'])->name('submission.store');
    Route::patch('/submission/update/{tugas}/{submission}', [SubmissionController::class, 'update'])->name('submission.update');
    
    Route::patch('/absens/toggle_status/{sesi}', [AbsensiController::class, 'toggleStatus'])->name('absens.toggle');
    Route::get('/penugasan/response/{penugasan}', [PenugasanController::class, 'responses'])->name('penugasan.responses');

    Route::post('/event_day/{event_day}/store/event/', [EventController::class, 'storeEvent'])->name('event.store');

    Route::post('groups/tambah_anggota/{group}', [GroupController::class, 'tambahAnggota'])->name('groups.anggota');
    Route::delete('groups/{group}/remove/{user}', [GroupController::class, 'removeAnggota'])->name('groups.removeAnggota'); 
    Route::delete('groups/{group}/anggoata/remove/all', [GroupController::class, 'removeAll'])->name('groups.removeAll');

    Route::resources([
        'penugasan' => PenugasanController::class,
        'submission' => SubmissionController::class,
        'groups' => GroupController::class,
        'event_days' => EventDayController::class,
        'events' => EventController::class,
        'absens' => AbsensiController::class,
    ]);

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

