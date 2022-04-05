<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organizer;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
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
        $credentials = $request->only('name','slug','date');
        //dd($credentials);
        $rules = [
            'slug' => 'unique:events,slug|regex:/^[a-z0-9\-]*$/'
        ];
        //dd($request->request[0]);
        $this->validate($request, $rules);
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
        return redirect()->route('events.index', compact('organizer'));
    }


    public function show($id)
    {
        $organizer = Auth::user();
        $event = $organizer->events->where('id', $id)->first();
        return view('events/detail', compact('event', 'organizer'));
    }


    public function edit($id)
    {
        return view('events.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
