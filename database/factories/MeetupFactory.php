<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meetup;

$factory->define(Meetup::class, function () {
    return [
        'api_url' => 'localhost/api',
    ];
});
