<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\Item;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return view('customers.orders', compact('items'));
    }

    public function historic()
    {
        $id = Auth::user()->user_id;
        $orders = Order::with('user')->where('user_id', $id)->orderBy('date', 'desc')->get();

        return view('customers.historic', compact('id', 'orders'));
    }


    public function create()
    {
        return view('customers.register-client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserPostRequest $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(UserPostRequest $request)
    {
        //$result = $request->validated();
        //
        //dd($result);

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('tel');
        $user->customer = 1;

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
