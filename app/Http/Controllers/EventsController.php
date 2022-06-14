<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = trim($request->input('sort'));
        $sort = in_array($sort, ['due_at', 'title', 'created_at']) ? $sort : 'due_at';

        $events = Event::orderBy($sort, 'ASC')->paginate(10);

        return view('calendar.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'due_at' => 'required|date_format:Y-m-d',
        ], [
        'due_at.required' => 'The due date is a required field!',
        'due_at.date_format' => 'The date does not match the format dd/mm/yyyy',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success','Event created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('calendar.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('calendar.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'due_at' => 'required|date_format:Y-m-d',
        ], [
        'due_at.required' => 'The due date is a required field!',
        'due_at.date_format' => 'The date does not match the format dd/mm/yyyy',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success','Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->user_id != auth()->user()->id) {
            return redirect()->route('events.index')->with('error','You are not allowed to delete another users event!');
        }

        Event::destroy($event->id);
        return redirect()->route('events.index')->with('success','Event deleted successfully.');

    }
}
