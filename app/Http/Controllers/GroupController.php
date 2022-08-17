<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    
    public function index()
    {
        $groups = Group::withCount('users')->paginate();
        return view('groups.index', compact('groups'));
    }

    
    public function create()
    {
        $users = User::has('groups', 0)->get();
        return view('groups.create', compact('users'));
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'color' => 'nullable',
        ]);

        $validated = $validator->validate();

        $colors = ['green', 'purple', 'yellow'];
        if ($validated['color'] == '') {
            $validated['color'] = $colors[array_rand($colors)];
        }

        $e = Group::create($validated);

        if($request->penanggungjawabs){
            $e->users()->syncWithPivotValues($request->penanggungjawabs, ['penanggung_jawab' => 1]);
        }

        if ($e) {
            return back()->with('success', 'Group berhasil dibuat');
        } else {
            return back()->with('error', 'Group gagal dibuat!');
        }
        
    }

    
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Group $group)
    {
        $group->users()->detach();
        $del = $group->delete();

        if ($del) {
            return redirect()->route('groups.index')->with('success', 'Group berhasil dihapus');
        }
        return redirect()->route('groups.index')->with('error', 'Group gagal dihapus');
    }
}
