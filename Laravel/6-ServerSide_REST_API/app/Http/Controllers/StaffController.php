<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Oi";
    }

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
        $new = new Staff;

        //dd($request);

        $new->full_name = $request->full_name;
        $new->photo = $request->file('photo')->store('photos', 'public');
        $new->code = Str::random(32);
        $new->save();


        $data = [
            'id' => $new->id,
            'full_name' => $new->full_name,
            'code' => $new->code
        ];

        return response()->json(['data'=>$data], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
