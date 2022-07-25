<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PenugasanController extends Controller
{
    
    public function index()
    {
        $all_tugas = Tugas::all();
        return view('penugasan.index', [
            'all_tugas' => $all_tugas
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        return view('penugasan.show',[
            'tugas' => Tugas::find($id)
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
