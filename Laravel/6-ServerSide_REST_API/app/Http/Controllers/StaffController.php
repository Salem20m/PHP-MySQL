<?php

namespace App\Http\Controllers;

use App\Http\Resources\LogResource;
use App\Http\Resources\PointResource;
use App\Models\Group;
use App\Models\Log;
use App\Models\Staff;
use App\Models\Point;
use App\Models\StaffAccess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class StaffController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'photo' => 'required|mimes:jpg',
        ];

        // if this function fails, it will throw a ValidationException
        // It will then bbe handled in the Handler.php file
        $this->validate($request, $rules);

        $new = Staff::create([
           "full_name" => $request->full_name,
           "photo" => $request->file('photo')->store('photos', 'public'),
           "code" => Str::random(32)
        ]);

        //Other Way----------------
        //$new = new Staff;
        //
        //$new->full_name = $request->full_name;
        //$new->photo = $request->file('photo')->store('photos', 'public');
        //$new->code = Str::random(32);
        //$new->save();


        $data = [
            'id' => $new->id,
            'full_name' => $new->full_name,
            'code' => $new->code
        ];

        return response()->json(['data'=>$data], 200);
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        //$allStaff = DB::select('SELECT id,full_name,code,photo FROM staff');
        $allStaff = Staff::all('id','full_name','code','photo');

        return response()->json(['data'=>[
            'items' => $allStaff
        ]], 200);
    }


    public function access(Request $request) {
        $rules = [
            'staff' => 'required|exists:staff,code',
            'point' => 'required|exists:points,id'
        ];

        $this->validate($request, $rules);

        $employee = Staff::where('code',$request->staff)->first();

        //$groups = DB::select('SELECT * FROM group_staff WHERE staff_id=?',[$employee->id]);
        $groups = Staff::find($employee->id)->groups;
        $points = Staff::find($employee->id)->groups
            ->map->points->flatten();

        //dd($points->map->parent->unique());

        $childPoints = $points->map->id;
        $parentPoints = $points->map->parent->unique();

        $allPoints = collect($childPoints)->merge($parentPoints);

        //CHECK IF EMPLOYEE HAS TEMPORARY ACCESS
        $staffAccesses = StaffAccess::where('staff_id', $employee->id)->where('point_id', $request->point)->get();

        //
        //foreach ($staffAccesses as $sa) {
        //    $difference = now()->timestamp - $sa->created_at->timestamp;
        //    if ($difference < $sa->time) {
        //        $hasAccess = true;
        //        break;
        //    }
        //}

        // BETTER METHOD
        $filteredAccesses = $staffAccesses->filter(function($a) {
           return (now()->timestamp - $a->created_at->timestamp) < $a->time;
        });

        $hasAccess = $filteredAccesses->isNotEmpty() || collect($allPoints)->contains($request->point);
        //dump($filteredAccesses);
        //dump(collect($allPoints)->contains($request->point));
        //dd($hasAccess);

        //if(!$hasAccess) {
        //    //foreach ($groups as $g) {
        //    //
        //    //    //dd($g);
        //    //    //$a = DB::select('SELECT * FROM group_points WHERE point_id=? AND group_id=?',[$request->point, $g->group_id]);
        //    //    //$a = DB::select('SELECT * FROM group_points WHERE point_id=? AND group_id=?',[$request->point, $g->pivot->group_id]);
        //    //    //dump($g->id);
        //    //    $p = Group::find($g->id)->points()->where("point_id", $request->point)->get();
        //    //
        //    //    if (!$p->isEmpty()) {
        //    //        $hasAccess = true;
        //    //        break;
        //    //    }
        //    //}
        //
        //    $hasAccess =
        //}

        $data = [
            'photo' => $employee->photo,
            'access' => $hasAccess
        ];

        // EXTERNAL API ACCESS
        //$cameraPicture = Http::post() ...

        // LOGS
        Log::Create([
            'staff_id' => $employee->id,
            'point_id' => $request->point,
            'camera' => 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png',
            'access' => (int) $hasAccess
        ]);


        return response()->json(['data'=>$data]);
    }

    public function showLogs(Request $request)
    {
        $rules = [
            'type' => 'sometimes|required|in:staff,point',

            'id' => [
                Rule::requiredIf($request->type == "staff"),
                'exists:staff,id'
            ],
            'id' => [
                Rule::requiredIf($request->type == "point"),
                'exists:points,id'
            ],
        ];

        $logs = Log::all();

        if ($request->type == 'staff') {
            //$rules = [
            //    'id' => 'required|exists:staff,id'
            //];
            $logs = Log::where('staff_id', $request->id)->get();
        }
        else if ($request->type == 'point') {
            //$rules = [
            //    'id' => 'required|exists:points,id'
            //];
            $logs = Log::where('point_id', $request->id)->get();
        }

        $this->validate($request, $rules);


        return response()->json(['data'=>[
            'items' => LogResource::collection($logs)
        ]]);
    }



    public function giveAccess(Request $request, $id)
    {
        $rules = [
            'point_id' => 'required|exists:points,id',
            'time' => 'required|numeric|min:1'
        ];

        $this->validate($request, $rules);

        StaffAccess::create([
            'staff_id' => $id,
            'point_id' => $request->point_id,
            'time' => $request->time
        ]);

        return response()->json(null, 201);
    }


}
