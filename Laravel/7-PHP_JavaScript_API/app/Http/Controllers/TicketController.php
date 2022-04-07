<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{


    public function create($eventID) {
        $organizer = Auth::user();
        $event = Event::find($eventID);
        return view('tickets.create', compact('event', 'organizer'));
    }



    public function store(Request $request, $eventID)
    {
        $event = Event::find($eventID);
        $rules = [
            'name' => 'required',
            'cost' => 'required',
            'amount' => [
                Rule::requiredIf($request->special_validity == 'amount')
            ],
            'valid_until' => [
                Rule::requiredIf($request->special_validity == 'date')
            ]
        ];

        //$messages = [
        //    "slug.regex" => "slug must not be empty and only contain a-z, 0-9, and '-'",
        //    "slug.unique" => "Slug is already used"
        //];

        //dd($request->request[0]);
        $this->validate($request, $rules);
        //$validator = Validator::make($request, $rules);
        //
        //
        //if($validator->fails()) {
        //    return redirect()->back());
        //}

        if ($request->special_validity == 'amount')
            $special = [
                'type' => 'amount',
                'amount' => $request->amount
            ];

        elseif ($request->special_validity == 'date')
            $special = [
                'type' => 'date',
                'amount' => $request->date
            ];

        else
        $special = null;

        Ticket::create([
            'event_id' => $eventID,
            'name' => $request->name,
            'cost' => $request->cost,
            'special_validity' => json_encode($special)
        ]);

        $organizer = Auth::user();
        return redirect()->route('events.show', $eventID)->with(compact('organizer', 'event'))->with('status', 'Ticket successfully created');
    }
}
