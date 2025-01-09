@extends('layouts.auth')

@section('content')
<div class="container-fluid vh-100 my-0">
    <div class="row h-100">
        <!-- Left Column -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center px-5">
            <div class="mb-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/Logo.svg') }}" alt="Logo" class="mb-3 mt-3" width="70">
                </a>
            </div>
            <h2 class="fw-bold mb-3">Create your account</h2>
            <p class="text-muted">Please fill in your details</p>
            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Birth Date Field -->
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required>
                    @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>
            </form>
            <div class="d-flex justify-content-center flex-column">
                <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-12 col-md-6 d-none d-md-block bg-purple text-center text-white" id="right-column-register">
        </div>
    </div>
</div>
@endsection
