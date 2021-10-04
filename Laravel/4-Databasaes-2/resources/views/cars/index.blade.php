@extends('layouts.app')

@section('content')
    <div>
        <div class="flex">
            <h1>CARS</h1>

            @foreach($cars as $car)
                <section>
                    <h2>
                        {{ $car['model'] }} : {{ $car['make'] }} --
                        <a href="{{ route('cars.edit', $car['id']) }}">Edit</a>
                    </h2>
                </section>
            @endforeach
            <a href="{{ route('cars.create') }}">Add a new Car</a>
        </div>

    </div>
@endsection
