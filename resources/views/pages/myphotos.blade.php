{{-- Page to Display All Photos of the Logged In User --}}
@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="card bg-dark text-light border-info shadow-lg p-4">
                <div class="card-body">
                    <div class="d-flex gap-4 flex-column flex-md-row align-items-center">
                        <!-- Profile Picture -->
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset(Auth::user()->profilepic) }}" 
                                 alt="User Avatar" 
                                 class="border border-info img-fluid w-100 shadow">
                        </div>
            
                        <!-- User Info -->
                        <div class="col-lg-9">
                            <h2 class="fw-bold">
                                <span class="text-info">{{ Auth::user()->name }}</span>
                                <span class="badge text-bg-warning fs-5">{{ Auth::user()->role ?? 'Member' }}</span>
                            </h2>

                            <div class="mb-3">
                                <span class="fw-semibold fs-4">Email:</span>
                                <p class="text-light">{{ Auth::user()->email ?? 'Not provided' }}</p>
                            </div>

                            <div class="mb-3">
                                <span class="fw-semibold fs-4">Bio:</span>
                                <p class="text-warning bg-black p-3 rounded-3 w-75 text-wrap">{{ Auth::user()->bio ?? 'No bio available.' }}</p>
                            </div>
            
                            <!-- Profile Button -->
                            <a href="{{route('pages.edit-profile')}}">
                                <button
                                    type="button"
                                    name=""
                                    id=""
                                    class="btn btn-info"
                                >
                                    <span class="fw-semibold fs-5">Edit Profile</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-start mt-3">
                <div class="card-body">
                    <!-- Masonry Grid -->
                    <div class="grid px-0">   
                        <div class="grid-item m-1">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title text-center mb-3">Have more memories?</h4>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('home')}}" class="mx-auto">
                                            <button class="btn btn-warning p-3 border border-3 border-dark">
                                                <span class="fw-semibold">Upload A Photo</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                </svg>
                                            </button>
                                        </a>                            
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if ($photos->isNotEmpty())
                            @foreach ($photos as $photo)
                            <!-- Individual grid item -->
                            <div class="grid-item m-1">
                                <div class="card rounded-1 shadow-lg">
                                    <div class="image-container">
                                        <img src="{{ asset($photo->file_path) }}" alt="{{ $photo->title }}" class="img-fluid">
                                        
                                        <!-- Overlay with title and buttons -->
                                        <div class="card-img-overlay d-flex align-content-center flex-wrap py-0 gap-3 overlay-hidden">
                                            <div class="w-100 text-center">
                                                <h5 class="text-light" id="photo-title-{{ $photo->id }}">{{ $photo->title }}</h5>
                                            </div>
                                            <div class="mx-auto">
                                                <!-- Edit Image Button -->
                                                <a href="#" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $photo->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
                                                </a>
                        
                                                <!-- Delete Image Button -->
                                                <button type="submit" class="btn btn-danger mx-1" onclick="softDeleteImage({{ $photo->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="grid-item m-1">
                                <h4 class="card-title text-center">Images Not Found</h4>
                                <p class="card-text text-center">There are no recorded images inside this account</p>
                            </div>
                        
                        @endif
                    </div>

                </div>
            </div>
            
        </div>
    </div>


    {{-- Modal Include --}}
    @include('components.modal')
@endsection