<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        $this->validate($request, $rules);

        $new = Group::create([
            'name' => $request->name
        ]);

        $data = [
            'id' => $new->id,
            'name' => $new->name
        ];

        return response()->json(['data' => $data], 201);
    }


    public function show()
    {
        $all = Group::all();

        return response()->json(['data'=>['items'=>$all]],200);
    }


    public function addToGroupPoints($id, Request $request)
    {
        $rules = [
            'points' => 'required|array|exists:points,id'
        ];

        $this->validate($request, $rules);

        $group = Group::find($id);

        foreach ($request->points as $pointID) {
            $group->points()->attach($pointID);
        }

        return response(null, 201);
    }


    public function addToGroupStaff($id, Request $request)
    {
        $rules = [
            'staff' => 'required|array|exists:staff,id'
        ];

        $this->validate($request, $rules);

        $group = Group::find($id);

        foreach ($request->staff as $staffID) {
            $group->staff()->attach($staffID);
        }

        return response(null, 201);
    }


}
