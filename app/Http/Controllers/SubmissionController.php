<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tugas;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubmissionRequest;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function storeSubmission(SubmissionRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['date_submitted'] = Carbon::now()->toDateTimeString();
        $validated['user_id'] = Auth::id();
        $validated['tugas_id'] = $id;
        
        if($request->hasFile('file')){
            $hashed = $request->file('file')->hashName();
            $file_date = Carbon::parse($validated['date_submitted'])->format('d-m-y');
            $filename = $file_date.'-'.Auth::id().'-'.$hashed;

            $path = Storage::putFileAs('submissions', $request->file('file'), $filename);
            $validated['file'] = $path;
        }

        Submission::create($validated);
        User::find(Auth::id())->tugas()->updateExistingPivot($id, ['status' => 1]);

        return back()->with('success', 'Tugas berhasil dikumpulkan!!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(SubmissionRequest $request, $tugas, Submission $submission)
    {
        $validated = $request->validated();
        $validated['date_submitted'] = Carbon::now()->toDateTimeString();
        $validated['user_id'] = Auth::id();
        $validated['tugas_id'] = $tugas;

        if ($request->hasFile('file')) {
            $hashed = $request->file('file')->hashName();
            $file_date = Carbon::parse($validated['date_submitted'])->format('d-m-y');
            $filename = $file_date . '-' . Auth::id() . '-' . $hashed;

            $path = Storage::putFileAs('submissions', $request->file('file'), $filename);
            $validated['file'] = $path;
        }

        $submission->update($validated);
        User::find(Auth::id())->tugas()->updateExistingPivot($tugas, ['status' => 1  ]);

        return back()->with('success', 'Tugas berhasil diubah!!');
    }

    
    public function destroy(Submission $submission)
    {
        $submission->user->tugas()->updateExistingPivot($submission->tugas->id, ['status' => 0]);
        $submission->delete();
        return back()->with('success', 'Submission berhasil dihapus!!');
    }

    public function download(Submission $submission)
    {
        // dd($submission->file);
        return Storage::download($submission->file);
    }
}

