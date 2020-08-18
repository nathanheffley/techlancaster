<?php

namespace App\Http\Controllers;

use App\Meetup;

class HomeController extends Controller
{
    public function __invoke()
    {
        $meetups = Meetup::all();
        $nextMeetings = $meetups
            ->map->nextMeeting
            ->filter()
            ->sortBy('time');

        return view('home', [
            'meetups' => $meetups,
            'nextMeetings' => $nextMeetings,
        ]);
    }
}
