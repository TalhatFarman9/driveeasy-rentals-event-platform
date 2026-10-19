<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(Event $event)
    {
        return view('registrations.create', [
            'event' => $event,
        ]);
    }

    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
                'max:255',
            ],
        ]);

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