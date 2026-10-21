<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        return view('registrations.create', [
            'events' => Event::orderBy('event_date')->get(),
            'selectedEvent' => $request->query('event'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
                'max:255',
            ],
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::findOrFail($validated['event_id']);

        Registration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()
            ->route('events.index')
            ->with('success', 'You have been registered for ' . $event->title . '!');
    }
}