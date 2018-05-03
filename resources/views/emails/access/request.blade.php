@extends('base/email')

@section('title', 'Welcome message')

@section('content')
    <h2>Welcome to Some App</h2>
    <p>
        Hai <span>{{ $access_email }}</span>,
        <br> welcome to Some App.
        <br> thanks for joining us,
        <br> for now you can access our public API with :
        <br> access id = <b>{{ $access_id }}</b>
        <br> access token = <b>{{ $access_token }}</b>
        <br> this account will expired in 30 days,
        <br>
        <br> best regards,
        <br><b>Fookipoke Studio</b>
    </p>
@endsection