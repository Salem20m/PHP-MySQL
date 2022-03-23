<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Http\Requests\ApiRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function authenticate(Request $request) {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            'login' => 'required',
            'password' => 'required',
        ]);

        //$errors = $validator->errors()->toArray();
       // //$map = $errors->map(function($error) {
       // //    return collect($error)->map(function ($item) use ($error) {
       // //        return $error => $item;
       // //    });
       // //});
       //
       // dd($errors);
       //
        $flattened = [];

       foreach ($validator->errors() as $key){
           foreach ($key as $error){
               $flattened[$key][] = $error;
           }
       }

       dd($flattened);

        if($validator->fails()) {
            $data = [
                'code' => 422,
                'message' => 'Validation error',
                "errors" => $validator->errors()
            ];
            return response()->json(['error'=>$data], 422);
        }

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken();

            // get user from
            $user = User::where('login',$request->login)->first();

            $data = [
                'token' => $token,
                'full_name' => $user->full_name,
            ];

            return response()->json(['data'=>$data], 200);
        }
        else {
            $data = [
                'code' => 401,
                'message' => 'Unauthorized',
                "errors" => [
                    'login' => 'invalid credentials'
                ],
            ];

            return response()->json(['error'=>$data], 401);
        }
    }
}
