<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            Storage::disk('local')->put('submissions', $request->file('file'));
            $path = Storage::url($filename);
            $validated['file'] = $path;
        }

        Submission::create($validated);

        return back()->with('success', 'Tugas berhasil dikumpulkan!!');
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
