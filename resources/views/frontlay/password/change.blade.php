@extends('base/main')
@section('title', 'Change password')
@section('content')
<div class="container d-flex animated fadeinDown">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h4 class="card-title" style="margin-bottom:30px">Change Password</h4>
            <form method="post">
                <div class="form-group">
                    <input type="password" class="form-control" name="newPassword" placeholder="Enter new password" required>
                    <small id="pwdHelp" class="form-text text-muted">Must be at least 8 characters.</small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirmNewPassword" placeholder="Confirm password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                <p class="alertFail">{{ $message }}</p>
            </form>
        </div>
    </div>
</div>
@endsection