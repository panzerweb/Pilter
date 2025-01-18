@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-between h-50 overflow-y-auto">
        <h1 class="fw-semibold">News Feed</h1>
        @foreach ($photos as $photo)
        <div class="shadow border border-2 border-dark rounded-3 p-1 d-flex flex-wrap my-3 gap-3">
            <div class="col-lg-5 mx-0">
                <img src="{{asset($photo->file_path)}}" alt="img-post" class="img-fluid rounded-3 border border-2 border-info" style="max-width: 100%;">
            </div>
            <div class="col-lg-5">
                <span>{{$photo->user->name}}</span>
                <h1>Title</h1>
                <p>{{$photo->title}}</p>
    
                <h2>Description</h2>
                <p>{{$photo->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection