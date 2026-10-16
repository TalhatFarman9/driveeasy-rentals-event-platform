<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/events', [EventsController::class, 'index'])->name('events.index');