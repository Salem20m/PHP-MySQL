<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

        Event::create([
            'organizer_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'date' => $request->date
        ]);

        $organizer = Auth::user();
        return redirect()->route('events.index')->with(compact('organizer'))->with('status', 'Event successfully created');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
