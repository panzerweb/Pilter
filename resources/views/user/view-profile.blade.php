{{-- Page to View Profile --}}
@extends('layouts.app')

@section('content')
    <div class="container-lg mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h3 class="mb-0">Profile Information</h3>
                    </div>
                    <div class="card-body p-4">
                        <!-- Profile Picture -->
                        <div class="d-flex flex-column align-items-center mb-4">
                            <img src="{{ asset($user->profilepic ?? 'images/default-avatar.png') }}" 
                                 alt="Profile Picture" 
                                 class="rounded-circle border border-3 border-light shadow-lg img-fluid" 
                                 width="150" height="150">
                            <h5 class="mt-3 fw-bold">{{ $user->name }}</h5>
                            <span class="text-muted">{{ $user->email }}</span>
                        </div>

                        <!-- Profile Details -->
                        <div class="px-3">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control bg-light" value="{{ $user->name }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Bio</label>
                                <textarea class="form-control bg-light" rows="3" disabled>{{ $user->bio }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" class="form-control bg-light" value="{{ $user->birth_date }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Joined On</label>
                                <input type="text" class="form-control bg-light" value="{{ $user->created_at->format('M d, Y') }}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
