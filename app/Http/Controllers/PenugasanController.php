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
        dd($request->all());
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
