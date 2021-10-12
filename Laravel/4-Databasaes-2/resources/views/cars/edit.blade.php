@extends('layouts.app')

@section('content')
    <div>
        <div class="flex">
            <h1>Edit</h1>

            <form action="{{route('cars.update', $car['id'])}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="model" value="{{$car['model']}}">
                <input type="text" name="make" value="{{$car['make_id']}}">
                <input type="number" name="year" value="{{$car['year']}}" min="1970">
                <button type="submit">Submit</button>
            </form>

        </div>

    </div>
@endsection
