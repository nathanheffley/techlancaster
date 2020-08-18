<?php

namespace App\Http\Controllers;

use App\Meetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MeetupController extends Controller
{
    public function edit(Meetup $meetup)
    {
        return view('meetups.edit', [
            'meetup' => $meetup,
        ]);
    }

    public function update(Request $request, Meetup $meetup)
    {
        $request->validate([
            'api_url' => 'required|url',
        ]);

        $meetup->update($request->only('api_url'));

        Cache::forget($meetup->apiDataCacheKey);

        $request->session()->flash('success', 'Meetup updated successfully!');

        return redirect()->back();
    }

    public function create()
    {
        return view('meetups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'api_url' => 'required|url',
        ]);

        $meetup = Meetup::create($request->only('api_url'));

        $request->session()->flash('success', 'Meetup added successfully!');

        return redirect()->route('meetups.edit', $meetup);
    }

    public function destroy(Request $request, Meetup $meetup)
    {
        $meetup->delete();

        $request->session()->flash('success', 'Meetup deleted!');

        return redirect()->route('admin');
    }

    public function refresh()
    {
        Meetup::all()->each(fn (Meetup $meetup) => Cache::forget($meetup->apiDataCacheKey));

        return redirect()->route('admin');
    }
}
