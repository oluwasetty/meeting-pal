<?php

namespace App\Http\Controllers;

use App\Models\EventSubscriber;
use App\Models\Meeting;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    //
    protected $client;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
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

        $event = Event::find($request->event_id);

        $attendees = [
            ["email" => $request->email],
            ["email" => $request->user_email]
        ];

        $meetingdetails = [
            "title" => $event->title,
            "description" => $event->description,
            "start_date" => "2022-09-28T17:00:00-07:00",
            "end_date" => "2022-09-28T17:00:00-08:00"
        ];

        

        return $this->createEvent($attendees, $meetingdetails);
        // return redirect()->back();
    }

    public function oauth()
    {
        session_start();
        $rurl = action('App\Http\Controllers\MeetingController@oauth');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);

            $_SESSION['access_token'] = $this->client->getAccessToken();
            $attendees = $_SESSION['attendees'];
            $meetingdetails = $_SESSION['meetingdetails'];

            $this->createEvent($attendees, $meetingdetails);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createEvent($attendees, $meetingdetails)
    {
        // session_start();
        $startDateTime = $meetingdetails["start_date"];
        $endDateTime = $meetingdetails["end_date"];

        
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $meetingdetails["title"],
                'description' => $meetingdetails["description"],
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
                'attendees' => $attendees
            ]);
            $results = $service->events->insert($calendarId, $event);
            return redirect()->to("/");
        } else {
            $_SESSION['attendees'] = $attendees;
            $_SESSION['meetingdetails'] = $meetingdetails;
            
            return redirect()->route('oauthCallback');
        }
    }
}
