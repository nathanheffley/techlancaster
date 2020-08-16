<?php

namespace App\Http\Controllers;

use App\Meetup;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'meetups' => Meetup::all(),
        ]);
    }
}
