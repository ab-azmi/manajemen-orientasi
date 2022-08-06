<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Requests\TugasRequest;
use App\Models\Group;
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
        $groups = Group::all();
        return view('penugasan.create', compact('groups'));
    }

    
    public function store(TugasRequest $request)
    {
        $validated = $request->validated();
        $validated['due_date'] = $request->due_date . ' ' . $request->due_time;

        try {
            if ($request->groups[0] == 'all') {
                $in = Tugas::create($validated)->users()->sync(User::pluck('id'));
            } else {
                $groups = Group::whereIn('id', $request->groups)->get();
                $p = Tugas::create($validated);
                foreach ($groups as $key => $group) {
                    $p->users()->syncWithoutDetaching($group->users->pluck('id'));
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('penugasan.create')->with('error', $e->getMessage());
        }

        return redirect()->route('penugasan.index')->with('success', 'Tugas berhasil dibuat');
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
    public function destroy(Tugas $penugasan)
    {
        $del = $penugasan->delete();
        if ($del) {
            return redirect()->route('penugasan.index')->with('success', 'Tugas berhasil dihapus');
        }
        return redirect()->route('penugasan.index')->with('error', 'Tugas gagal dihapus');
    }
}
