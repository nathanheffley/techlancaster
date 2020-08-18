<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Meetup;
use Illuminate\Support\Str;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class ICalController extends Controller
{
    public function next(Meetup $meetup)
    {
        /** @var Meeting $nextMeeting */
        $nextMeeting = $meetup->nextMeeting;

        $event = Event::create()
            ->name($nextMeeting->title)
            ->description($nextMeeting->description)
            ->uniqueIdentifier(md5($meetup->id.$nextMeeting->time->toAtomString()))
            ->startsAt($nextMeeting->time)
            ->endsAt($nextMeeting->time->clone()->addHour());

        $calendar = Calendar::create(config('app.name'))->event($event);

        return response($calendar->get())
            ->header('Content-Type', 'text/calendar')
            ->header('Content-Disposition', 'attachment; filename='.Str::slug($meetup->name).'.ics')
            ->header('charset', 'utf-8');
    }
}
