@extends('layouts.auth')

@section('content')
<div class="container-fluid vh-100 my-0">
    <div class="row h-100">
        <!-- Left Column -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center px-5">
            <div class="mb-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/Logo.svg') }}" alt="Logo" class="mb-3" width="70">
                </a>
            </div>
            <h2 class="fw-bold mb-3">Welcome back</h2>
            <p class="text-muted">Please enter your details</p>
            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember for 30 days
                    </label> --}}
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
                    <button type="button" class="btn btn-outline-dark btn-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                        </svg>                        
                        Sign in with Google
                    </button>
                </div>
            </form>
            <div class="d-flex justify-content-center flex-column">
                <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                <a class="float-end text-decoration-none text-center" href="{{ route('password.request') }}">Forgot password</a>
            </div>

        </div>

        <!-- Right Column -->
        <div class="col-12 col-md-6 d-none d-md-block bg-purple text-center text-white" id="right-column-login">
            
        </div>
    </div>
</div>
@endsection
