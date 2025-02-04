@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, Admin!</p>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="">
                    <td scope="row">{{$user->name}}</td>
                    <td scope="row">{{$user->role}}</td>
                    <td scope="row">
                        <a href="{{ route('user.show-profile') }}">
                            <button
                                type="button"
                                name=""
                                id=""
                                class="btn btn-primary"
                            >
                                View Profile
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
