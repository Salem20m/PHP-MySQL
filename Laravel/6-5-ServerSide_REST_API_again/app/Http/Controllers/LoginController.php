<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request) {
        $rules = [
            'login' => 'required',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        if (Auth::attempt($request->all())) {

            $user = User::where('login', $request->login)->first();

            $user->api_token = Str::random(30);
            $user->save();

            return response()->json(['data' =>
                [
                    'token' => $user->api_token,
                    'full_name' => $user->full_name
                    ]
                ]
            );
        }

        $data = [
            'code' => 401,
            'message' => 'Unauthorized',
            "errors" => [
                'login' => 'invalid credentials'
            ],
        ];

        return response()->json(['data' => $data]);
    }
}
