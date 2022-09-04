<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Meeting;
use App\Models\User;

class EventController extends Controller
{

    /**
     * Get list of events.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $events = Event::where("user_id", \Auth::user()->id)->get();

        return view("/dashboard", compact("events"));
    }

    /**
     * Join event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getEvent($username, $link)
    {
        $event = Event::where("link", $link)->first();
        $user = User::where('username', $username)->first();
        
        return view("/join-event", compact("event", "user"));
    }

    /**
     * Join event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getMeetings($event_id)
    {
        $meetings = Meeting::where("event_id", $event_id)->get();
        
        return view("/meeting_list", compact("meetings"));
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'platform' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'string', 'max:255'],
            'weekly_schedule' => ['required', 'string', 'max:255'],
        ]);

        Event::create([
            'title' => $request->title,
            'platform' => $request->platform,
            'description' => $request->description,
            'type' => $request->type,
            'link' => $request->link,
            'user_id' => \Auth::user()->id,
            'duration' => $request->duration,
            'weekly_schedule' => $request->weekly_schedule,
            'time_after' => $request->time_after,
            'time_before' => $request->time_before
        ]);

        return redirect("/dashboard");
    }
}
