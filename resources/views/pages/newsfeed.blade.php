@extends('layouts.app')

@section('content')

<div class="container py-4">
    <!-- Title Section -->
    <h1 class="fw-semibold text-center mb-4">News Feed</h1>

    <!-- News Feed Posts -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            @foreach ($photos as $photo)
            <!-- Post Section -->
            <div class="card shadow-sm border-0 mb-4">
                <!-- Post Header -->
                <div class="d-flex align-items-center p-3 border-bottom">
                    <img src="https://via.placeholder.com/50" alt="user-avatar" class="rounded-circle me-3" width="50" height="50">
                    <div>
                        <h6 class="mb-0 fw-bold">{{$photo->user->name}}</h6>
                        <small class="text-muted">{{ $photo->created_at->format('M d, Y h:i A') }}</small>
                    </div>
                </div>
                
                <!-- Post Image -->
                <img src="{{ asset($photo->file_path) }}" alt="img-post" class="img-fluid">

                <!-- Post Body -->
                <div class="card-body">
                    <!-- Title -->
                    <h5 class="fw-bold mb-2">{{$photo->title}}</h5>

                    <!-- Description -->
                    <p class="text-muted">
                        {{ $photo->description }}
                    </p>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-around gap-1">
                            <button class="btn btn-sm btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5"/>
                                </svg>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                                </svg>
                            </button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-chat-dots"></i> Comment
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection