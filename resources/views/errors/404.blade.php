@extends('base/main')

@section('title', '404')

@section('content')
   <div class="container d-flex">
        <div class="error animated fadeInDown">
            <div class="error-title m-b-md">
                <h1>404</h1>
                <h2>page not found</h2>
            </div>
            <div class="links">
                <a href="{{ URL::to('/') }}">Home</a>
                <a href="https://asmith.my.id" target="_blank">Asmit</a>
            </div>
        </div>
    </div>
@endsection