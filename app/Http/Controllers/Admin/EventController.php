<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

       $events = Event::all();
       // $publishers = Publisher::paginate(10);
       // need to test if with 'books' works
       // $publishers = Publisher::with('books')->get();

        return view('admin.events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $request->validate([
            'name' => 'required',
            'bio' => 'required',
        ]);

        $event = Event::create([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        return to_route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Event $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }

        return view('admin.events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
       $event->update([
        'name' => $request->name,
        'bio' => $request->bio,
        ]);

        return to_route('admin.events.show', $event)->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $event->delete();

        return to_route('admin.event.index')->with('success', 'Event deleted successfully');
    }
}