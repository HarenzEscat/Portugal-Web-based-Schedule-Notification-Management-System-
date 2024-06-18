<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Fetch all events from database
        return view('calendar', compact('events'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Create a new event
        $event = new Event();
        $event->title = $validated['title'];
        $event->date = $validated['date'];
        $event->save();

        return redirect()->route('calendar.index')->with('success', 'Event created successfully!');
    }
}
