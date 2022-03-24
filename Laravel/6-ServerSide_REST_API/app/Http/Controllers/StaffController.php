<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
        $allStaff = Staff::all()->toArray();

        return response()->json(['data'=>[
            'items' => $allStaff
        ]], 200);
    }



}
