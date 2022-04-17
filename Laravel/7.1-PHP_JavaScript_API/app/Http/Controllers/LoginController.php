<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function authenticate(Request $request) {

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('events.index');
        }

        return back()->withErrors([
            'message' => 'Email or password not correct'
        ]);
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }

    public function attendeeLogin(Request $request) {
        //$rules = [
        //    'lastname' => 'required|exists:attendees,lastname',
        //    'registration_code' => 'required|exists:attendees,registration_code'
        //];
        //
        //$this->validate($request, $rules);

        $attendee = Attendee::where('lastname', $request->lastname)->where('registration_code', $request->registration_code)->first();

        if($attendee) {
            $attendee->login_token = md5($attendee->username);
            $attendee->save();

            $body = [
                'firstname' => $attendee->firstname,
                'lastname' => $attendee->lastname,
                'username' => $attendee->username,
                'email' => $attendee->email,
                'token' => $attendee->login_token,
            ];

            return response()->json($body);
        }
        else {
            return response()->json(['message' => 'Invalid login'], 401);
        }

    }

    public function attendeeLogout(Request $request)
    {
        $attendee = Attendee::where('login_token', $request->token)->first();
        //dd($attendee);
        if ($attendee) {
            $attendee->login_token = '';
            $attendee->save();
            return response()->json(['message' => 'Logout success']);
        }

        return response()->json(['message' => 'Invalid token'], 401);
    }

}
