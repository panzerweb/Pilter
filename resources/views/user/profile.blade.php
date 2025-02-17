{{-- resources/views/user/profile.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="card bg-dark text-light border-info shadow-lg p-4">
                <div class="card-body">
                    <div class="d-flex gap-4 flex-column flex-md-row align-items-center">
                        <!-- Profile Picture -->
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset($user->profilepic) }}" 
                                 alt="User Avatar" 
                                 class="border border-info img-fluid w-100 shadow">
                        </div>
            
                        <!-- User Info -->
                        <div class="col-lg-9">
                            <h2 class="fw-bold">
                                <span class="text-info">{{ $user->name }}</span>
                                <span class="badge text-bg-warning fs-5">{{ $user->role ?? 'Member' }}</span>
                            </h2>

                            <div class="mb-3">
                                <span class="fw-semibold fs-4">Email:</span>
                                <p class="text-light">{{ $user->email ?? 'Not provided' }}</p>
                            </div>

                            <div class="mb-3">
                                <span class="fw-semibold fs-4">Bio:</span>
                                <p class="text-warning bg-black p-3 rounded-3 w-75 text-wrap">{{ $user->bio ?? 'No bio available.' }}</p>
                            </div>
            
                            <!-- Profile Button -->
                            <a href="{{ route('user.show-profile', $user->id) }}">
                                <button type="button" class="btn btn-info px-4 fw-semibold">
                                    <span class="fw-semibold fs-5">View Profile</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Display User Photos -->
            <div class="card text-start mt-3">
                <div class="card-body">
                    <div class="grid px-0">   
                        @foreach ($photos as $photo)
                            <div class="grid-item m-1">
                                <div class="card rounded-1 shadow-lg">
                                    <div class="image-container">
                                        <img src="{{ asset($photo->file_path) }}" alt="{{ $photo->title }}" class="img-fluid">
                                        <div class="card-img-overlay d-flex align-content-center flex-wrap py-0 gap-3 overlay-hidden">
                                            <div class="w-100 text-center">
                                                <h5 class="text-light" id="photo-title-{{ $photo->id }}">{{ $photo->title }}</h5>
                                            </div>
                                            <div class="mx-auto">
                                                <a href="#" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#showModal{{ $photo->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Modal Include --}}
    @include('components.modal')
@endsection
