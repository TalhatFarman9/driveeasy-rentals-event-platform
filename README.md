# DriveEasy Rentals Event Platform

A small Laravel app where DriveEasy Rentals shows upcoming events and lets visitors register online.

## Features
- Responsive landing page with an event teaser
- Events table with seeded sample data (5 events)
- Event listing at /events with search (title or location) and pagination
- Registration form at /events/{event}/register with server-side validation

## Setup
1. composer install
2. copy .env.example to .env, then run php artisan key:generate
3. php artisan migrate:fresh --seed
4. php artisan serve