<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function create(Request $request) {
        $rules = [
            'full_name' => 'required',
            'photo' => 'required|mimes:jpg'
        ];

        $this->validate($request, $rules);

        $newStaff = Staff::create([
            'full_name' => $request->full_name,
            'photo' => $request->file('photo')->store('photos', 'public'),
            'code' => Str::random(32),
        ]);
        $newStaff->save();

        return response()->json([
            'data' => [
                'id' => $newStaff->id,
                'full_name' => $newStaff->full_name,
                'code' => $newStaff->code
                ]
        ]);
    }
}
