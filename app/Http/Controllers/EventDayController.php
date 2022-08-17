<?php

namespace App\Http\Controllers;

use App\Models\EventDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_days = EventDay::with('events')->orderBy('day_date')->get();
        return view('event_days.index', compact('event_days'));
    }

    
    public function create()
    {
        return view('event_days.create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'day_date' => 'required'
        ]);
        $validated = $validator->validated();

        $event_day = EventDay::create($validated);

        if($event_day){
            return redirect()->route('event_days.show', $event_day)->with('success', 'Event Day berhasil dibuat!');
        }else{
            return back()->with('error', 'Event Day gagal dibuat!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EventDay $event_day)
    {
        $events = $event_day->with('events')->get();
        return view('event_days.show', compact('event_day', 'events'));
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
    public function destroy(EventDay $event_day)
    {
        $del = $event_day->delete();

        if ($del) {
            return redirect()->route('event_days.index')->with('success', 'Day berhasil dihapus');
        }
        return redirect()->route('event_days.index')->with('error', 'Day gagal dihapus');
    }
}
