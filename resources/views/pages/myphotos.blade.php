{{-- Page to Display All Photos of the Logged In User --}}
@extends('layouts.app')

@section('content')

    <div class="container-lg">
        <div class="row justify-content-center">
        @foreach ($photos as $photo)
            <div class="col-lg-3 m-3">
                <div class="card border-primary">
                    <img src="{{asset($photo->file_path)}}" alt="Brand">
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection