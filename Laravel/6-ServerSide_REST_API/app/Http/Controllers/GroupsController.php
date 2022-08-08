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

    public function delete(Request $request, $id)
    {
        Group::where('id', $id)->delete();
    }

    public function showByID($id)
    {
        $group = Group::where('id', $id)->first();

        $data = [
            'id' => $group->id,
            'name' => $group->name,
            'staff' => $group->staff->map->id,
            'points' => $group->points->map->id
        ];

        return response()->json(['data'=>$data],200);
    }

    public function deleteStaff(Request $request, $id)
    {
        $rules = [
            'staff' => 'required|array|exists:staff,id'
        ];

        $this->validate($request, $rules);

        $group = Group::where('id', $id)->first();

        foreach ($request->staff as $staffID) {
            $group->staff()->detach($staffID);
        }
    }

    public function deletePoints(Request $request, $id)
    {
        $rules = [
            'points' => 'required|array|exists:points,id'
        ];

        $this->validate($request, $rules);

        $group = Group::where('id', $id)->first();

        foreach ($request->points as $pointID) {
            $group->points()->detach($pointID);
        }
    }

}
