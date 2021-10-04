@extends('layouts.app')

@section('content')
    <div>
        <div class="flex">
            <h1>Create Car</h1>

            <form action="/cars" method="POST">

                @csrf
                <input type="text" name="model" placeholder="model">
                <input type="text" name="make" placeholder="make">
                <input type="number" name="year" placeholder="year" min="1970">
                <button type="submit">Submit</button>

            </form>
        </div>

    </div>
@endsection
