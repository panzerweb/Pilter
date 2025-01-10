{{-- Page to Display Deleted Photos --}}
@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="row justify-content-center">
        <h1 class="fw-semibold text-dark">
            <span class="text-info">Deleted</span> Photos
        </h1>
    </div>
    <div class="row mt-4">
        {{-- Left Column: Deleted Photos Count and Trash Image --}}
        <div class="col-lg-4 d-flex justify-content-center align-items-center flex-column mb-5">
            <img src="{{ asset('images/misc/Trash-nocount.svg') }}" alt="Trash Illustration" class="img-fluid mb-3">
            <div class="text-center">
                <h3 class="fw-semibold text-dark">
                    You have <strong>{{ $photos->whereNotNull('deleted_at')->count() }}</strong> deleted photos
                </h3>

                <button class="btn btn-danger fw-semibold my-3" onclick="deleteAll()">Delete All</button>
            </div>
        </div>

        {{-- Right Column: Deleted Photos Grid --}}
        <div class="col-lg-8">
            <div class="grid px-0">
                @foreach ($photos as $photo)
                    @if ($photo->deleted_at)
                        {{-- Individual Grid Item --}}
                        <div class="grid-item m-1">
                            <div class="card rounded-1 border border-3 border-dark">
                                <div class="image-container">
                                    <img src="{{ asset($photo->file_path) }}" alt="{{ $photo->title }}" class="img-fluid">

                                    {{-- Overlay with Title and Buttons --}}
                                    <div class="card-img-overlay d-flex align-content-center flex-wrap py-0 gap-3 overlay-hidden">
                                        <div class="w-100 text-center">
                                            <h5 class="text-light" id="photo-title-{{ $photo->id }}">{{ $photo->title }}</h5>
                                        </div>
                                        <div class="mx-auto">
                                            {{-- Restore Image Button --}}
                                            <button type="submit" class="btn btn-info mx-1" onclick="restoreImage({{ $photo->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                                                </svg>
                                            </button>

                                            {{-- Permanently Delete Image Button --}}
                                            <button type="submit" class="btn btn-danger mx-1" onclick="permanentDelete({{ $photo->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Modal Include --}}
@include('components.modal')
@endsection
