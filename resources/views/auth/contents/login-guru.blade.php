@extends('auth.base')
@section('content')
<h1 class="auth-title">Log in Guru</h1>

<form action="/login-guru" method="POST">
    @csrf

    <div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror form-control-xl" placeholder="Email">
            <div class="form-control-icon">
                <i class="bi bi-at"></i>
            </div>
        </div>
        @error('email')
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
        @enderror
    </div>

    <div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        @error('password')
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
</form>
@endsection