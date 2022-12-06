<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Drink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
        ->times(3)
        ->create();

        foreach(Drink::all() as $drink)
        {
            $events = Event::inRandomOrder()->take(rand(1,3))->pluck('id');
            $drink->events()->attach($events);
        }
    }
}
