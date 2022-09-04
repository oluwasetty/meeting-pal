<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventSubscriber;
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
        $organizer = "$user->first_name $user->last_name";
        

        return view("/join-event", compact("event", "organizer"));
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
     * Join event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function joinEvent(Request $request)
    {
        $eventsub = EventSubscriber::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "event_id" => $request->event_id
        ]);

        $meeting = Meeting::create([
            "event_id" => $request->event_id,
            "event_subscriber_id" => $eventsub->id,
            "date" => $request->date_select,
            "time" => $request->time_select,
            "notes" => $request->notes,
            "status" => "pending"
        ]);

        return redirect()->back();
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
