<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request-> input('search');
        $events = Event::when($search, function($query, $search){
                return $query->where('title', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        })
        ->orderBy('event_date')
        ->paginate(6)
        ->withQueryString();
    return view('events.index', [
        'events' => $events,
        'search' => $search,
    ]);
    }
}
