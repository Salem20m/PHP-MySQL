<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $error = 'Email or password not correct';
        return view('index', compact('error'));
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }

}
