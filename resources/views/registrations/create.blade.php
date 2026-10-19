@extends('layouts.app')

@section('title', 'Register - ' . $event->title)

@section('content')

   <section class="register-page">
       <div class="container">
           <h1> Register for {{ $event->title }}</h1>
           <p class="event-meta"> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }} &middot; {{ $event->location }} </p>

           @if ($errors->any())
               <div class="form-errors">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li> {{ $error }} </li>
                       @endforeach
                   </ul>      
               </div>  
            @endif
            <form method="POST" action="{{ route('registrations.store', $event) }}" class="register-form" novalidate>
                @csrf
                
                <label for="name"> Full name </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">

                <label for="email"> Email </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">

                <button type="submit" class="btn"> Confirm Registration </button>
            </form>
        </div>
    </section>   
    
    @endsection
    