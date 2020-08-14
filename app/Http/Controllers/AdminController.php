<?php

namespace App\Http\Controllers;

use App\Meetup;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'meetups' => Meetup::all(),
        ]);
    }
}
