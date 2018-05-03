@extends('base/email')

@section('title', 'Welcome message')

@section('content')
    <h2>Welcome to Some App</h2>
    <p>
        Hello <span>{{ $name }}</span>,
        <br> welcome to Some App.
    </p>
@endsection