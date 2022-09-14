<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Event;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\SessionTime;

class SessionController extends Controller
{
    public function create($eventID)
    {
        $organizer = Auth::user();
        $event = Event::find($eventID);
        return view('sessions.create', compact('event', 'organizer'));
    }

    private function rules($request)
    {
        return [
            'room' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'description' => 'required',
            'start' => ['required', 'date'],

            'end' => ['required', 'date', 'after:start',
                function ($attribute, $value, $fail) use($request) {
                    $booked = Session::where('room_id', $request->room)->where('start', '<=', $request->end)
                                                                        ->where('end', '>=', $request->start)
                                                                        ->first();
                    if ($value == '2000-10-3') $fail('My birthday');
                    if ($booked) {
                        $fail('Room already booked during this time');
                    }
            }]
        ];
    }

    public function store(Request $request, $eventID)
    {
//        dd($request->all());
        $event = Event::find($eventID);


        $this->validate($request, $this->rules($request));

        Session::create([
            'room_id' => $request->room,
            'title' => $request->title,
            'description' => $request->description,
            'speaker' => $request->speaker,
            'start' => $request->start,
            'end' => $request->end,
            'type' =>$request->type,
            'cost' => $request->cost
        ]);

        $organizer = Auth::user();

        return redirect()->route('events.show', $eventID)->with(compact('organizer', 'event'))
                                                                ->with('status', 'Session successfully created');
    }

    public function edit($eventID, $id)
    {
        $organizer = Auth::user();
        $event = Event::find($eventID);
        $session = Session::find($id);
        return view('sessions.edit', compact('session', 'organizer','event'));
    }

    public function update(Request $request, $eventID, $id)
    {
        $this->validate($request, $this->rules($request));

        $organizer = Auth::user();
        $event = Event::find($eventID);
        $session = Session::find($id);

        $session->room_id = $request->room;
        $session->title = $request->title;
        $session->description = $request->description;
        $session->speaker = $request->speaker;
        $session->start = $request->start;
        $session->end = $request->end;
        $session->type =$request->type;
        $session->cost = $request->cost;

        $session->save();

        $session = Session::find($id);

        return redirect()->route('events.show', $eventID)->with(compact('organizer','session', 'event'))->with("status", "Session successfully updated");
    }
}