@extends('layouts.app')

@section('title', 'Register for an event - DriveEasy Rentals')

@section('content')

    <section class="register-page">
        <div class="container">
            <h1>Register for an event</h1>

            @if ($errors->any())
                <div class="form-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('registrations.store') }}" class="register-form" novalidate>
                @csrf

                <label for="name">Full name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">

                <label for="event_id">Event</label>
                <select id="event_id" name="event_id">
                    <option value="">Select an event</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" @selected(old('event_id', $selectedEvent) == $event->id)>
                            {{ $event->title }} ({{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }})
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn">Confirm registration</button>
            </form>
        </div>
    </section>

@endsection