<?php

namespace App\Http\Controllers;

use App\Http\Resources\apiRegistrationResource;
use App\Models\Attendee;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Session;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store($organizerSlug, $eventSlug, Request $request) {

        $attendee = Attendee::where('login_token', $request->token)->first();
        $ticket = Ticket::find($request->ticket_id);

        // Checking if attendee is not logged in
        if(!$attendee) {
            return response()->json(['message' => 'User not logged in'], 401);
        }


        // Checking if attendee already registered for this event
        $eventID = Event::where('slug', $eventSlug)->first()->id;
        $tickets = Event::find($eventID)->first()->tickets->map->id;
        $registrations = Registration::whereIn('ticket_id', $tickets)->where('attendee_id', $attendee->id)->first();

        if($registrations) {
            return response()->json(['message' => 'User already registered'], 401);
        }


        // Checking if tickets are available
        if ($ticket->special_validity) {
            $sv = json_decode($ticket->special_validity);
            if ($sv->type == 'date') {
                if ($sv->date < now())
                    return response()->json(['message' => 'Ticket is no longer available'], 401);
            }
            if ($sv->type == 'amount') {
                $noOfTickets = Registration::where('ticket_id', $request->ticket_id)->count();
                if ($sv->amount < $noOfTickets)
                    return response()->json(['message' => 'Tickets are sold out'], 401);
            }

        }

        $newRegistration = Registration::create([
            'attendee_id' => $attendee->id,
            'ticket_id' => $request->ticket_id,
            'registration_time' => now(),
        ]);

        foreach($request->session_ids as $sessionID) {
            $session = Session::where("id", $sessionID)->first();
            if($session->type == 'workshop') {
                $newRegistration->workshopRegistrations()->attach($sessionID);
            }
        }

        return response()->json(['message' => 'Registration successful']);

    }

    public function show(Request $request) {
        $attendee = Attendee::where('login_token', $request->token)->first();
        if(!$attendee) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        $registrations = $attendee->registrations;
        //dd($registrations[0]);

        return response()->json(['registrations' => apiRegistrationResource::collection($registrations)]);
    }
}
