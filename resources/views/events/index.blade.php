@extends('layouts.app')
@section('title', 'Upoming Events - DriveEasy Rentals')
@section('content')

   <section class="events-page">
        <div class="container">
            <h1>Upcoming Events</h1>
            @if (session('success'))
    <div class="form-success">{{ session('success') }}</div>
            @endif
            <form method="GET" action="{{ route('events.index') }}" class="search-form">
                <input type="text" name="search" placeholder="Search by title or location" value="{{ $search }}">
                <button type="submit" class="btn"> Search </button>
</form>
<div class="event-list">
    @forelse ($events as $event)
    <div class="event-card">
        <h3> {{ $event -> title }}</h3>
        <p class="event-mata"> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }} &middot; {{ $event->location }}</p>
        <p> {{ $event-> description }}</p>
        <a href="{{ route('registrations.create', $event) }}" class="btn">Register</a>
    </div>
@empty
    <p>No events found.</p>
@endforelse
</div>
<div class="pagination-links">
    {{ $events->links() }}
</div>
</div>
</section>
@endsection
