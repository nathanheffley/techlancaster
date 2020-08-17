<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Meetup;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function __invoke()
    {
        $meetups = Meetup::all();
        $nextMeetings = $meetups->filter()
            ->map->nextMeeting
            ->sortBy('time');

        return view('home', [
            'meetups' => $meetups,
            'nextMeetings' => $nextMeetings,
        ]);
    }
}
