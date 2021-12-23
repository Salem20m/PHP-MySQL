<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{

    public function index(Request $request)
    {

        $orders = Order::with('user')->orderBy('order_id', 'DESC')->get();

        return view('employees.orders-placed', compact('orders'));
    }

    public function indexFiltered(Request $request)
    {
        $filter = [];
        $filter[0] = $request->filter;
        if($filter[0] == 'All')
        {
            return redirect()->route('employee.index');
        }
        $orders = Order::with('user')->where('status', $filter[0])
            ->orderBy('order_id', 'DESC')->get();

        return view('employees.orders-placed', compact('orders', 'filter'));
    }

    public function fee()
    {
        $fee = Fee::first();
        return view('employees.tax-fee', ['fee' => $fee]);
    }

    public function storeFee(Request $request)
    {
        $fee = Fee::first();

        $fee->fee = $request->fee;
        $fee->save();

        return redirect()->route('employee.fee');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.register-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->customer = 0;

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('employee.index');
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
