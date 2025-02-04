{{-- EDIT PROFILE --}}
@extends('layouts.app')

@section('content')
    <div class="container-lg py-4">
        <div class="row justify-content-center">
            <h3 class="text-center mb-4">Edit Profile</h3>
            <div class="col-12 col-lg-6">
                <!-- Profile Image on the Left -->
                <div class="me-4 text-center">
                    <img src="{{ asset(Auth::user()->profilepic) }}" class="rounded-2 border border-1 shadow-sm img-fluid" alt="Profile Picture">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- Form on the Right -->
                <div class="flex-grow-1">
                    <form method="POST" action="{{ route('user.edit', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <!-- Bio -->
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea id="bio" class="form-control" name="bio" rows="3">{{ old('bio', Auth::user()->bio) }}</textarea>
                        </div>

                        <!-- Profile Image Upload -->
                        <div class="mb-3">
                            <label for="profilepic" class="form-label">Change Profile Picture</label>
                            <input type="file" id="profilepic" class="form-control" name="profilepic">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                        </div>
                    </form>
                </div>

                <form method="POST" action="{{ route('user.passwordedit', Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- New password -->
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            id="password"
                            placeholder="Enter your new password"
                            autocomplete="current-password"
                        />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password_confirmation"
                            id="password-confirm"
                            placeholder="Enter your new password"
                            autocomplete="current-password"
                        />
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection