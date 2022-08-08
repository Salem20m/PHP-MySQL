<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Http\Requests\ApiRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function authenticate(Request $request) {

        $rules = [
            'login' => 'required',
            'password' => 'required',
        ];

        // if this function fails, it will throw a ValidationException
        // It will then bbe handled in the Handler.php file
        $this->validate($request, $rules);

        //$validator = Validator::make($credentials, $rules);
        //if($validator->fails()) {
        //    $data = [
        //        'code' => 422,
        //        'message' => 'Validation error',
        //        "errors" => $validator->errors()
        //    ];
        //    return response()->json(['error'=>$data], 422);
        //}

        $credentials = $request->all();

        if (Auth::attempt($credentials)) {
            //$user = Auth::user();
            $user = User::where('login',$request->login)->first();

            $token = $user->createToken();
            //dd($token);

            $data = [
                'token' => $token,
                'full_name' => $user->full_name,
            ];


            return response()->json(['data'=>$data], 200);
        }

        $data = [
            'code' => 401,
            'message' => 'Unauthorized',
            "errors" => [
                'login' => 'invalid credentials'
            ],
        ];

        return response()->json(['error'=>$data], 401);

    }

    public function registerUser(Request $request) {

        $rules = [
            'full_name' => 'required',
            'login' => 'required|unique:users,login',
            'password' => 'required',
        ];


        $this->validate($request, $rules);

        $newUser = User::create([
            'full_name' => $request->full_name,
            'login' => $request->login,
            'password' => Hash::make($request->password)
        ]);

        $data = [
            'id' => $newUser->id,
            'full_name' => $newUser->full_name,
        ];

        return response()->json(['data'=>$data], 201);

    }
}
