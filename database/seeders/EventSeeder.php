<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Autumn Drive Meet',
                'description' => 'A weekend drive and meetup with other renters, snacks and a short route.',
                'event_date' => '2026-10-25',
                'location' => 'Rawalpindi',
            ],
            [
                'title' => 'City Car Showcase',
                'description' => 'See our full fleet up close and get special weekend rental discounts.',
                'event_date' => '2026-11-02',
                'location' => 'Islamabad',
            ],
            [
                'title' => 'Night Drive Experience',
                'description' => 'A guided evening drive through the city with a group of renters.',
                'event_date' => '2026-11-10',
                'location' => 'Rawalpindi',
            ],
            [
                'title' => 'Winter Road Trip Planning',
                'description' => 'Learn tips for long winter drives and book your trip car early.',
                'event_date' => '2026-12-05',
                'location' => 'Islamabad',
            ],
            [
                'title' => 'DriveEasy Anniversary Meet',
                'description' => 'Celebrating one year of DriveEasy Rentals with giveaways and raffles.',
                'event_date' => '2026-12-20',
                'location' => 'Rawalpindi',
            ],
        ];

        // firstOrCreate keeps the seeder safe to run on every deploy: no duplicates
        foreach ($events as $event) {
            Event::firstOrCreate(['title' => $event['title']], $event);
        }
    }
}
