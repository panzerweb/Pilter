@extends('layouts.app')

@section('content')
<div class="container-lg mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark text-light border-info shadow-lg rounded-4">
                
                <!-- Profile Header -->
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <!-- Profile Picture -->
                        <div class="col-md-4 text-center">
                            <img src="{{ asset($user->profilepic ?? 'images/default-avatar.png') }}" 
                                 alt="Profile Picture" 
                                 class="border border-4 border-info shadow-lg img-fluid" 
                                 width="180" height="180">
                        </div>

                        <!-- User Info -->
                        <div class="col-md-8">
                            <h2 class="fw-bold text-info">{{ $user->name }}</h2>
                            <p class="text-secondary">{{ $user->email }}</p>
                            
                            <!-- User Stats -->
                            {{-- <div class="d-flex gap-4 my-3">
                                <div>
                                    <h5 class="fw-bold text-light">120</h5>
                                    <span class="text-muted">Posts</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-light">2.4k</h5>
                                    <span class="text-muted">Followers</span>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-light">500</h5>
                                    <span class="text-muted">Following</span>
                                </div>
                            </div> --}}

                            <!-- Action Buttons -->
                            {{-- <div class="d-flex gap-2">
                                <button class="btn btn-info text-light px-4 fw-semibold"><i class="bi bi-person-plus"></i> Follow</button>
                                <button class="btn btn-outline-light px-4"><i class="bi bi-chat-dots"></i> Message</button>
                                <button class="btn btn-outline-secondary"><i class="bi bi-three-dots"></i></button>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Profile Details Section -->
                <div class="card-footer bg-secondary bg-opacity-25 p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-info">Username</label>
                                <input type="text" class="form-control bg-dark text-light border-info" value="{{ $user->name }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-info">Bio</label>
                                <textarea class="form-control bg-dark text-light border-info" rows="3" disabled>{{ $user->bio ?? 'No bio available.' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-info">Date of Birth</label>
                                <input type="date" class="form-control bg-dark text-light border-info" value="{{ $user->birth_date }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-info">Joined On</label>
                                <input type="text" class="form-control bg-dark text-light border-info" value="{{ $user->created_at->format('M d, Y') }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
