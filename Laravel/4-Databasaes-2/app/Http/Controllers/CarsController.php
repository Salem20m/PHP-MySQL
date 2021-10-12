<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;         //-----------------------------//


class CarsController extends Controller
{

    public function index()
    {
        //$cars = Car::where('make', '=', 'Lexus')->get();
        //$cars = Car::all();
        $cars = Car::with('make')->get();

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
        $car->make_id = $request->input('make');
        $car->year = $request->input('year');

        $car->save();

        return redirect('cars');
    }


    public function show($id)
    {
        dd("Salem");
    }


    public function edit($id)
    {
        $car = Car::find($id);

        return view('cars.edit')->with('car', $car);
    }


    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->model = $request->input('model') ?? $car->model;
        $car->make_id = $request->input('make');
        $car->year = $request->input('year');

        $car->save();

        return redirect('cars');
    }


    public function destroy($id)
    {
        $car = Car::find($id);

        $car->delete();

        return redirect('cars');
    }
}
