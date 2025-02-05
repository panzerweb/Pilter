{{-- Page to Display All Photos of the Logged In User --}}
@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="card text-start">
                <div class="card-body">
                    <div class="d-flex gap-3 flex-column flex-md-row justify-content-center align-items-center">
                        <div class="col-lg-3 mx-auto">
                            <img src="{{asset(Auth::user()->profilepic)}}" alt="user-avatar" class="text-center object-fit-cover me-3 border border-dark img-fluid w-75">
                        </div>
                        <div class="col-lg-9">
                            <h1 class="fw-semibold text-dark">
                                <span class="text-info">{{ Auth::user()->name }}</span>
                            </h1>
                            <h5 class="fw-semibold">Bio: </h5>
                            <p>{{Auth::user()->bio}}</p>
                                
                            <a href="{{route('pages.edit-profile')}}">
                                <button
                                    type="button"
                                    name=""
                                    id=""
                                    class="btn btn-primary"
                                >
                                    Edit Profile
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
                    </div>
                </div>
            </div>
            
        </div>
    </div>


    {{-- Modal Include --}}
    @include('components.modal')
@endsection