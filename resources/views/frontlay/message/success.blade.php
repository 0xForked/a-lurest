@extends('base/main')

@section('title', 'Success')

@section('content')

   <div class="container d-flex animated fadeInDown">
        <div class="error">
            <div class="error-title m-b-md">
                <h2>RESTfull Project</h3>
                <h3>- {{ $message }} -</h4>
            </div>
            <div class="links">
                <a href="{{ URL::to('/') }}">Home</a>
                <a href="https://asmith.my.id" target="_blank">Asmit</a>
            </div>
        </div>
    </div>

@endsection