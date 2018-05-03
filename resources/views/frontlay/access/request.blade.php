@extends('base/main')

@section('title', 'Reques API Public')

@section('content')
    <div class="container d-flex animated fadeinDown">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:30px">Request API Public </h4>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                        <small id="emailHelp" class="form-text text-muted">Must be a valid email.</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <p class="alertFail">{{ $message }}</p>
                </form>
            </div>
        </div>
    </div>
@endsection