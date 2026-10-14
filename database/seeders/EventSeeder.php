<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'title'=> 'Autumn Drive Meet',
            'description' => 'A weekend drive and meetup with other renters, snacks and  a short route.',
            'event_date' => '2026-10-25',
            'location' => 'Rawalpindi',
]);

Event::create([
            'title'=> 'City Car Showcase',
            'description' => 'See our full fleet up close and get special weekend rental discounts.',
            'event_date' => '2026-11-2',
            'location' => 'Islamabad',
]);

Event::create([
            'title'=> 'Night Drive Experience',
            'description' => 'A guided evening drive through the city with a group of renters.',
            'event_date' => '2026-11-10',
            'location' => 'Rawalpindi',
]);

Event::create([
            'title'=> 'Winter Road Trip Planning',
            'description' => 'Learn tips for long winter drives and book your trip car early.',
            'event_date' => '2026-12-5',
            'location' => 'Islamabad',
]);

Event::create([
            'title'=> 'DriveEasy Anniversary Meet',
            'description' => 'Celebrating one year of DriveEasy Rentals with giveaways and raffles.',
            'event_date' => '2026-12-20',
            'location' => 'Rawalpindi',
]);
 
    }
}
