@extends('base/email')

@section('title', 'Reset password link')

@section('content')
    <h2>Reset password link</h2>
    <p>
        Hello <span>{{ $name }}</span>,
        <br> <a href="http://localhost:8080/user/password/change?code={{ $forgotcode }}">Forgot password link</a>
    </p>
@endsection