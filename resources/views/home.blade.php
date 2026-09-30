@extends('layouts.app')

@section('title', 'DriveEasy Rentals - Home')

@section('content')

    <section class="hero">
        <div class="container">
            <h1>Rent a car without the hassle</h1>
            <p>DriveEasy Rentals gives you clean, reliable cars for daily use, trips, and events across Rawalpindi and Islamabad.</p>
            <a href="{{ url('/events') }}" class="btn">See upcoming events</a>
        </div>
    </section>

    <section class="event-teaser">
        <div class="container">
            <h2>Next up: our Autumn Drive Meet</h2>
            <div class="teaser-card">
                <div class="teaser-image" aria-hidden="true"></div>
                <div class="teaser-text">
                    <p>Join us for a short weekend drive and meetup with other renters. Snacks, a short route, and a raffle for a free weekend rental.</p>
                    <a href="{{ url('/events') }}" class="link">View all events &rsaquo;</a>
                </div>
            </div>
        </div>
    </section>

@endsection
