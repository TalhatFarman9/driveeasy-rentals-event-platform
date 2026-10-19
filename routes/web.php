<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('home');
});

Route::get('/events', [EventsController::class, 'index'])->name('events.index');

Route::get('/events/{event}/register', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/events/{event}/register', [RegistrationController::class, 'store'])->name('registrations.store');