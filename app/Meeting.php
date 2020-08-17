<?php

namespace App;

use Illuminate\Support\Carbon;

class Meeting
{
    public Meetup $meetup;

    public string $title;

    public string $description;

    public Carbon $time;

    public function __construct(Meetup $meetup, string $title, string $description, Carbon $time)
    {
        $this->meetup = $meetup;
        $this->title = $title;
        $this->description = $description;
        $this->time = $time;
        $this->time->tz = 'America/New_York';
    }
}
