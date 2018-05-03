@extends('base/main')

@section('title', 'Home')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md animated zoomInDown">
                RESTfull Project
            </div>
            <div class="links animated fadeinUp">
                <a href="https://asmith.my.id">Home</a>
                <a href="#about" data-toggle="modal" data-target="#AboutModalCenter">About</a>
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle animated infinite pulse" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">API Public</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ URL::to('/public/request') }}">Request Access</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="{{ URL::to('') }}">Status Account</a>
                        <a class="dropdown-item disabled" href="{{ URL::to('') }}">Status API</a>
                    </div>
                </div>
                <a href="#tech" data-toggle="modal" data-target="#TechModalCenter">tech</a>
                <a href="{{ URL::to('docs') }}">Docs</a>
            </div>
        </div>
    </div>

    <!-- Modal About -->
    <div class="modal fade" id="AboutModalCenter" tabindex="-1" role="dialog" aria-labelledby="AboutModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AboutModalLongTitle">About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tech -->
    <div class="modal fade" id="TechModalCenter" tabindex="-1" role="dialog" aria-labelledby="TechModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TechModalLongTitle">Technology</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

@endsection