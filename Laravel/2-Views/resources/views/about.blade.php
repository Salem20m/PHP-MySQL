@extends('layouts.app')

@section('content')

    @if(!empty($name))
        <h1>Name is not empty!</h1>
    @endif

    @isset($name)
        <h1>Name has been set!</h1>
    @endisset

    {{--  FORELSE has a built-in checker for if the array is empty, using empty  --}}
    @forelse($names as $n)
        <h2>Name is {{ $n }}</h2>

    @empty {{--In case names array is empty, it will print this--}}
        <h2>Name is empty</h2>
    @endforelse

@endsection
