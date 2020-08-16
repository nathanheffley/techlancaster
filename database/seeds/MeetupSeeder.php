<?php

use App\Meetup;
use Illuminate\Database\Seeder;

class MeetupSeeder extends Seeder
{
    public function run()
    {
        factory(Meetup::class)->create([
            'api_url' => 'https://lancasterlaravel.com/api',
        ]);
    }
}
