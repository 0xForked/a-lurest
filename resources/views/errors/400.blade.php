@extends('base/main')

@section('title', '400')

@section('content')
   <div class="container d-flex">
        <div class="error animated fadeInDown">
            <div class="error-title m-b-md">
                <h1>400</h1>
                <h2>bad request</h2>
            </div>
            <div class="links">
                <a href="{{ URL::to('/') }}">Home</a>
                <a href="https://asmith.my.id" target="_blank">Asmit</a>
            </div>
        </div>
    </div>
@endsection