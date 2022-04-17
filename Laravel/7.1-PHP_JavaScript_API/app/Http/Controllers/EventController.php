<?php

namespace App\Http\Controllers;

use App\Http\Resources\apiEventResource;
use App\Http\Resources\apiEventDetailResource;
use App\Http\Resources\apiTicketResource;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organizer;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    private $rules = [                        // only [a-z] [0-9] & '-'
        'name' => 'required',
            //'slug' => ['required,unique:events,slug|regex:/^[a-z0-9\-]*$/' => 'slug must not be empty and only contain a-z, 0-9, and \'-\''],
        'slug' => 'required|unique:events,slug|regex:/^[a-z0-9\-]*$/',
        'date' => 'required|date',
    ];

    private $messages = [
        "slug.regex" => "slug must not be empty and only contain a-z, 0-9, and '-'",
        "slug.unique" => "Slug is already used"
    ];

    public function index()
    {
        $organizer = Auth::user();
        return view('events/index', compact('organizer'));
    }


    public function create()
    {
        $organizer = Auth::user();
        return view('events.create', compact('organizer'));
    }


    public function store(Request $request)
    {
        //dd($credentials);


        //dd($request->request[0]);
        $this->validate($request, $this->rules, $this->messages);
        //$validator = Validator::make($credentials, $rules);
        //
        //
        //if($validator->fails()) {
        //    return redirect()->back();
        //}

        $event = Event::create([
            'organizer_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'date' => $request->date
        ]);

        $organizer = Auth::user();
        return redirect()->route('events.show', $event->id)->with(compact('organizer'))->with('status', 'Event successfully created');
    }


    public function show($id)
    {
        $organizer = Auth::user();
        //$event = $organizer->events->where('id', $id)->first();
        $event = Event::find($id);



        return view('events/detail', compact('event', 'organizer'));
    }


    public function edit($id)
    {
        $organizer = Auth::user();
        $event = $organizer->events->find($id);
        return view('events.edit', compact('id', 'organizer','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:events,slug,' . $id . '|regex:/^[a-z0-9\-]*$/';
        $this->validate($request, $rules, $this->messages);

        //dd($request->all());
        $organizer = Auth::user();
        $event = $organizer->events->find($id);

        $event->name = $request->name;
        $event->slug = $request->slug;
        $event->date = $request->date;

        $event->save();

        return redirect()->route('events.show', $id)->with(compact('organizer','id', 'event'))->with("status", "Event successfully updated");
    }


    public function reports($id)
    {
        $organizer = Auth::user();
        $event = Event::find($id);
        $sessions = $event->channels->map->sessions->flatten();

        $sessionTitles = $sessions->map->title;

        $sessionCapacities = $sessions->map->room->map->capacity;

        $sessionAttendees = $sessions->map->workshopRegistrations->map->count();

        $sessionAttendees = $sessionAttendees->map(function($item, $key) use ($sessions){
            if($item == 0)
                return $sessions[$key]->room->channel->event->registrations->count();
            else
                return $item;
        });


        $sessionColors = $sessions->map(function ($item, $key) {
            if ($item->room->capacity <= $item->room->channel->event->registrations->count())
                return 'rgba(255, 99, 132, 0.2)';
            else
                return 'rgba(99, 255, 132, 0.2)';
        });


        return view('reports.index', compact('organizer', 'event','sessionTitles', 'sessionCapacities', 'sessionColors', 'sessionAttendees'));
    }




    public function apiIndex() {
        $events = Event::all();
        return response()->json(['events' => apiEventResource::collection($events)]);
    }


    public function apiShow($organizerSlug, $eventSlug) {
        $organizer = Organizer::where('slug', $organizerSlug)->first();
        if(!$organizer)
            return response()->json(['message' => 'Organizer not found'], 404);

;       $event = Event::where('organizer_id', $organizer->id)->where('slug', $eventSlug)->first();
        if(!$event)
            return response()->json(['message' => 'Event not found'], 404);

        $sessions = $event->channels->map->sessions->flatten()->map(function ($item) {
            return collect($item)->except(['room_id']);
        });

        $tickets = $event->tickets;
        //dd($tickets);

        //dd(collect($sessions[0])->except(['room_id']));
        //dd($sessions);

        $body =
            [
                "id" => $event->id,
                "name" =>  $event->name,
                "slug" => $event->slug,
                "session" => $sessions,
                "tickets" => apiTicketResource::collection($tickets),
                "date" => Carbon::parse($event->date)->format('Y-m-d'),
                'organizer' => $event->organizer
            ];

        return response()->json([$body]);
    }


}
