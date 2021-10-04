<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;         //-----------------------------//


class CarsController extends Controller
{

    public function index()
    {
        $cars = Car::where('make', '=', 'Lexus')->get();
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }


    public function create()
    {
        return view('cars.create');
    }


    public function store(Request $request)
    {
        $car = new Car;
        $car->model = $request->input('model');
        $car->make = $request->input('make');
        $car->year = $request->input('year');

        $car->save();

        return redirect('cars');
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


    public function edit($id)
    {
        $car = Car::find($id);

        return view('cars.edit')->with('car', $car);
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
        $car = Car::find($id);
        $car->model = $request->input('model') ?? $car->model;
        $car->make = $request->input('make');
        $car->year = $request->input('year');

        $car->save();

        return redirect('cars');
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
