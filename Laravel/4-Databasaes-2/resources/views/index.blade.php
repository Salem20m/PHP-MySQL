@extends('layouts.app')

@section('content')
    <div>
        <div class="flex">
            <h1>CARS</h1>

            @foreach($cars as $car)
                <section>
                    <h2>{{ $car['model'] }} : {{ $car['make'] }}</h2>
                </section>
            @endforeach
        </div>
    </div>
@endsection
