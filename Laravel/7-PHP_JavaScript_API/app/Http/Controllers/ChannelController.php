<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ChannelController extends Controller
{
    public function create($eventID) {
        $organizer = Auth::user();
        $event = Event::find($eventID);
        return view('channels.create', compact('event', 'organizer'));
    }



    public function store(Request $request, $eventID)
    {
        $event = Event::find($eventID);
        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        Channel::create([
            'event_id' => $eventID,
            'name' => $request->name
        ]);

        $organizer = Auth::user();
        return redirect()->route('events.show', $eventID)->with(compact('organizer', 'event'))->with('status', 'Channel successfully created');
    }
}
