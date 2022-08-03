<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class PenugasanController extends Controller
{
    
    public function index()
    {
        $all_tugas = Tugas::latest()->paginate();
        return view('penugasan.index', [
            'all_tugas' => $all_tugas
        ]);
    }

    
    public function create()
    {
        return view('penugasan.create');
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'deskripsi' => 'required',
            'due_date' => 'required|date',
            'priority' => 'nullable'
        ]);

        // dd($validator->validated());

        $in = Tugas::create($validator->validated());
        
        if($in){
            return redirect()->route('penugasan.index')->with('success', 'Tugas berhasil dibuat');
        }
        return redirect()->route('penugasan.create')->with('error', 'Tugas gagal dibuat');

    }

    
    public function show(Tugas $penugasan)
    {
        return view('penugasan.show',[
            'tugas' => $penugasan
        ]);
    }

    
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
