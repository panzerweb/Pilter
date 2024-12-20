{{-- Page to Display All Photos of the Logged In User --}}
@extends('layouts.app')

@section('content')

    <div class="container-lg">
        <div class="row justify-content-center">
        <h1 class="fw-semibold text-center text-light">
            <span class="text-info">{{Auth::user()->name}}</span> Photos
        </h1>
        @foreach ($photos as $photo)
            <div class="col-lg-3 m-3">
                <div class="card border-primary rounded-3">
                    
                    <img src="{{asset($photo->file_path)}}" alt="Brand" class="img-fluid rounded-3">

                    <div class="card-img-overlay d-flex justify-content-center flex-wrap align-items-center overlay-hidden gap-3">
                        <h5 class="text-light text-center" id="photo-title-{{$photo->id}}">{{$photo->title}}</h5>

                        <a href="#" class="btn btn-warning text-center" data-bs-toggle="modal" data-bs-target="#editModal{{$photo->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <a href="#" class="btn btn-danger text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>



    {{-- Modal Include --}}
    @include('components.modal')
@endsection