{{-- Page to Edit Profile --}}
@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Profile</div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            
                            <!-- Username -->
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="name" value="{{ old('name', $user->name) }}" disabled autofocus>
                                </div>
                            </div>

                            <!-- Bio -->
                            <div class="form-group row">
                                <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                                <div class="col-md-6">
                                    <textarea id="bio" class="form-control" name="bio" rows="4" disabled>{{ old('bio', $user->bio) }}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
