<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        return view('order-details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $items = $request->items;
        $qtts = [];
        foreach ($items as $item) {
            $qtts[] = $request->input('item-' . $item);
        }

        $itemsObj = Item::whereIn('item_id', $items)->get()->toArray();

        DB::transaction(function() use($itemsObj, $request, $qtts) {
            $order = new Order;
            $order->date = today()->format('Y-m-d');
            $order->delivery_pickup_time = $request->input('time');
            $order->fee = Fee::getCurrentFee();
            $order->delivery = $request->input('local');
            $order->user_id = Auth::user()->user_id;

            $value = 0;
            foreach ($itemsObj as $item) {
                //calculating the value
                $value += $item['price'] * $qtts[array_search($item['item_id'], array_column($itemsObj, 'item_id'))];
            }

            $order->value = $value;
            $order->save();

            $address = $request->input('address').', '.$request->input('number').', '.$request->input('freej');
            $address .= ', '.$request->input('city');

            foreach ($itemsObj as $item) {
                //attaching
                $order->items()->attach($item['item_id'], [
                    "address" => $address,
                    "quantity" => $qtts[array_search($item['item_id'], array_column($itemsObj, 'item_id'))]
                ]);
            }
        });

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['user', 'items'])->find($id);

        //dd($order->items()->first()->pivot->address);
        $items = $order->items()->get();
        //foreach ($items as $item) {
        //    dump($item->name);
        //    dump($item->price);
        //    dump($item->pivot->quantity * $item->price);
        //}
        //die;

        return view('order-details', compact('order', 'items'));

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
