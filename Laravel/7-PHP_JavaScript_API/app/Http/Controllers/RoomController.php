<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function create($eventID) {
        $organizer = Auth::user();
        $event = Event::find($eventID);
        return view('rooms.create', compact('event', 'organizer'));
    }



    public function store(Request $request, $eventID)
    {
        $event = Event::find($eventID);
        $rules = [
            'name' => 'required',
            'capacity' => 'required'
        ];

        $this->validate($request, $rules);

        Room::create([
            'channel_id' => $request->channel,
            'name' => $request->name,
            'capacity' => $request->capacity
        ]);

        $organizer = Auth::user();
        return redirect()->route('events.show', $eventID)->with(compact('organizer', 'event'))->with('status', 'Room successfully created');
    }
}
